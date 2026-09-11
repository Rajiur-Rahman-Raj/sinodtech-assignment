<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;


class ProductService
{

    public function __construct(private ProductRepository $productRepository)
    {
        // $this->productRepository = $productRepository;
    }

    public function createProduct(array $data): Product
    {
        //here you can add any additional business logic or validation before creating the product

        return $this->productRepository->create($data);

    }

}
