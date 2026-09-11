<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function create(array $data)
    {
        $product = Product::create([
            'name' => $data['name'],
            'sku' => $data['sku'],
            'price' => $data['price'],
            'status' => $data['status'],
        ]);

        // Create inventory for the product in the specified branch
        $product->inventories()->create([
            'branch_id' => $data['branch_id'],
            'quantity' => $data['quantity'],
        ]);

        return $product;
    }
}
