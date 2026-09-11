<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;


class ProductService
{

    public function __construct(private ProductRepositoryInterface $productRepository)
    {
    }

    public function createProduct(array $data): Product
    {
        //here you can add any additional business logic or validation before creating the product

        $product = $this->productRepository->create($data);

        // Create inventory for the product in the specified branch
        $product->inventories()->create([
            'branch_id' => $data['branch_id'],
            'quantity' => $data['quantity'],
        ]);

        return $product;

    }

}
