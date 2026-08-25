<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserLocationController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'address' => ['required', 'string', 'max:500'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
        ]);

        $location = $request->user()
            ->locations()
            ->create($validated);

        return response()->json([
            'message' => 'Location saved successfully.',
            'location' => $location,
        ]);
    }


    public function testDeliveryLogic()
    {
        /*
        |--------------------------------------------------------------------------
        | Dummy Customer
        |--------------------------------------------------------------------------
        */

        $customer = [
            'name' => 'Customer',
            'latitude' => 23.7599000,
            'longitude' => 90.4300000,
        ];


        /*
        |--------------------------------------------------------------------------
        | Dummy Vendors
        |--------------------------------------------------------------------------
        */

        $vendors = [
            [
                'id' => 1,
                'name' => 'Vendor A',
                'latitude' => 23.7665000,
                'longitude' => 90.4235000,
            ],

            [
                'id' => 2,
                'name' => 'Vendor B',
                'latitude' => 23.7800000,
                'longitude' => 90.4100000,
            ],

            [
                'id' => 3,
                'name' => 'Vendor C',
                'latitude' => 23.8200000,
                'longitude' => 90.4000000,
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | Nearby Vendor Filtering
        |--------------------------------------------------------------------------
        */

        $nearbyVendors = collect($vendors)
            ->filter(function ($vendor) use ($customer) {

                $distance = $this->distanceInKilometers(
                    $customer['latitude'],
                    $customer['longitude'],
                    $vendor['latitude'],
                    $vendor['longitude']
                );

                $vendor['straight_distance_km'] = round($distance, 2);

                return $distance <= 5;
            })
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Google Routes API
        |--------------------------------------------------------------------------
        */

        foreach ($nearbyVendors as $key => $vendor) {

            $response = Http::withHeaders([
                'X-Goog-Api-Key' => config('services.google_maps.key'),
                'X-Goog-FieldMask' => 'routes.distanceMeters,routes.duration',
            ])->post(
                    'https://routes.googleapis.com/directions/v2:computeRoutes',
                    [
                        'origin' => [
                            'location' => [
                                'latLng' => [
                                    'latitude' => $customer['latitude'],
                                    'longitude' => $customer['longitude'],
                                ],
                            ],
                        ],

                        'destination' => [
                            'location' => [
                                'latLng' => [
                                    'latitude' => $vendor['latitude'],
                                    'longitude' => $vendor['longitude'],
                                ],
                            ],
                        ],

                        'travelMode' => 'DRIVE',

                        'routingPreference' => 'TRAFFIC_AWARE',

                        'computeAlternativeRoutes' => false,

                        'languageCode' => 'en-US',

                        'units' => 'METRIC',
                    ]
                );


            if ($response->successful() && !empty($response['routes'][0])) {

                $route = $response['routes'][0];

                $nearbyVendors[$key]['road_distance_km'] =
                    round($route['distanceMeters'] / 1000, 2);

                $nearbyVendors[$key]['duration'] =
                    $route['duration'] ?? null;

            } else {

                $nearbyVendors[$key]['road_distance_km'] = null;
                $nearbyVendors[$key]['duration'] = null;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Delivery Business Logic
        |--------------------------------------------------------------------------
        */

        foreach ($nearbyVendors as $key => $vendor) {

            $distance = $vendor['road_distance_km'];

            if ($distance === null) {

                $nearbyVendors[$key]['delivery_available'] = false;
                $nearbyVendors[$key]['delivery_charge'] = null;

            } elseif ($distance <= 3) {

                $nearbyVendors[$key]['delivery_available'] = true;
                $nearbyVendors[$key]['delivery_charge'] = 0;

            } elseif ($distance <= 5) {

                $nearbyVendors[$key]['delivery_available'] = true;
                $nearbyVendors[$key]['delivery_charge'] = 50;

            } else {

                $nearbyVendors[$key]['delivery_available'] = false;
                $nearbyVendors[$key]['delivery_charge'] = null;
            }
        }


        return response()->json([
            'customer' => $customer,

            'vendors' => $nearbyVendors,
        ]);
    }

    private function distanceInKilometers(
        float $lat1,
        float $lng1,
        float $lat2,
        float $lng2
    ): float {
        $earthRadius = 6371;

        $latDifference = deg2rad($lat2 - $lat1);
        $lngDifference = deg2rad($lng2 - $lng1);

        $a =
            sin($latDifference / 2) ** 2
            +
            cos(deg2rad($lat1))
            *
            cos(deg2rad($lat2))
            *
            sin($lngDifference / 2) ** 2;

        $c = 2 * atan2(
            sqrt($a),
            sqrt(1 - $a)
        );

        return $earthRadius * $c;
    }
}
