@extends('layouts.app')

@section('title', 'Google Maps')

@section('content')

    <div class="container">

        <div class="row">

            <nav class="mb-4">
                <ol class="breadcrumb mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Google Maps
                    </li>

                </ol>
            </nav>

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <p class="mb-0">Google Maps</p>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">

                                <label for="place-search" class="form-label">
                                    Search Location
                                </label>

                                <div id="place-autocomplete"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="latitude" class="form-label">
                                    Latitude
                                </label>

                                <input type="text" id="latitude" class="form-control" placeholder="Click on the map"
                                    readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="longitude" class="form-label">
                                    Longitude
                                </label>

                                <input type="text" id="longitude" class="form-control" placeholder="Click on the map"
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="address" class="form-label">
                                    Address
                                </label>

                                <input type="text" id="address" class="form-control"
                                    placeholder="Selected location address" readonly>
                            </div>
                        </div>

                        <div id="google-map"></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@push('scripts')
    <script>
        let map;
        let marker;
        let geocoder;

        async function initMap() {

            const [{
                Map
            }, {
                AdvancedMarkerElement
            }, {
                PlaceAutocompleteElement
            }] =
            await Promise.all([
                google.maps.importLibrary("maps"),
                google.maps.importLibrary("marker"),
                google.maps.importLibrary("places"),
            ]);

            const center = {
                lat: 23.8103,
                lng: 90.4125
            };

            map = new Map(document.getElementById("google-map"), {
                center: center,
                zoom: 12,
                mapId: "DEMO_MAP_ID",
            });

            geocoder = new google.maps.Geocoder();

            /*
             * Initial marker
             */
            marker = new AdvancedMarkerElement({
                map: map,
                position: center,
            });

            /*
             * Place Autocomplete
             */
            const placeAutocomplete = new PlaceAutocompleteElement();

            placeAutocomplete.placeholder = "Search for a location...";

            /*
             * Restrict results to Bangladesh
             */
            placeAutocomplete.includedRegionCodes = ["bd"];

            document
                .getElementById("place-autocomplete")
                .appendChild(placeAutocomplete);

            /*
             * Place selected
             */
            placeAutocomplete.addEventListener(
                "gmp-select",
                async ({
                    placePrediction
                }) => {

                    const place = placePrediction.toPlace();

                    await place.fetchFields({
                        fields: [
                            "displayName",
                            "formattedAddress",
                            "location"
                        ]
                    });

                    if (!place.location) {
                        return;
                    }

                    const latitude = place.location.lat();
                    const longitude = place.location.lng();

                    /*
                     * Update input fields
                     */
                    document.getElementById("latitude").value =
                        latitude.toFixed(7);

                    document.getElementById("longitude").value =
                        longitude.toFixed(7);

                    document.getElementById("address").value =
                        place.formattedAddress ?? '';

                    /*
                     * Move map
                     */
                    map.setCenter(place.location);

                    map.setZoom(16);

                    /*
                     * Move marker
                     */
                    marker.position = place.location;
                }
            );

            /*
             * Map click
             */


            map.addListener("click", async function(event) {

                const lat = event.latLng.lat();
                const lng = event.latLng.lng();

                document.getElementById("latitude").value =
                    lat.toFixed(7);

                document.getElementById("longitude").value =
                    lng.toFixed(7);

                marker.position = event.latLng;

                await reverseGeocode(event.latLng);
            });
        }

        async function reverseGeocode(location) {

            try {

                const response = await geocoder.geocode({
                    location: location,
                });

                if (response.results.length > 0) {

                    const address = response.results[0].formatted_address;

                    document.getElementById('address').value = address;

                } else {

                    document.getElementById('address').value =
                        'Address not found';
                }

            } catch (error) {

                console.error('Reverse geocoding failed:', error);

                document.getElementById('address').value =
                    'Unable to find address';

            }
        }
    </script>

    <script async
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&loading=async&callback=initMap">
    </script>
@endpush
