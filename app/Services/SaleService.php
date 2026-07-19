<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SaleService
{
    public function store(array $data): Sale
    {
        return DB::transaction(function () use ($data) {

            $sale = Sale::create([
                'invoice_no' => generateInvoiceNo(),
                'branch_id' => $data['branch_id'],
                'customer_id' => $data['customer_id'],
                'sale_date' => $data['sale_date'],
                'grand_total' => 0,
            ]);

            $grandTotal = 0;
            $saleItems = [];

            foreach ($data['products'] as $item) {

                $inventory = Inventory::query()
                    ->with('product')
                    ->where('branch_id', $data['branch_id'])
                    ->where('product_id', $item['product_id'])
                    ->lockForUpdate()
                    ->first();

                if (!$inventory) {
                    throw ValidationException::withMessages([
                        'products' => 'Inventory not found.',
                    ]);
                }

                if ($inventory->quantity < $item['quantity']) {
                    throw ValidationException::withMessages([
                        'products' => 'Insufficient stock for ' . $inventory->product->name,
                    ]);
                }

                $price = $inventory->product->price;
                $subtotal = $price * $item['quantity'];

                $saleItems[] = [
                    'sale_id' => $sale->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $price,
                    'subtotal' => $subtotal,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];


                $inventory->decrement('quantity', $item['quantity']);

                $grandTotal += $subtotal;
            }

            SaleItem::insert($saleItems);

            $sale->update([
                'grand_total' => $grandTotal,
            ]);

            return $sale;
        });
    }
}
