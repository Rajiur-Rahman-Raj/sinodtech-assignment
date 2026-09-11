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
            'status' => $data['status'] ?? true,
        ]);

        return $product;
    }
}
