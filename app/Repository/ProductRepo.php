<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepo
{
    public function getAllPagination($per_page = 10)
    {
        return Product::latest()->paginate($per_page);
    }

    public function getById($id)
    {
        return Product::find($id);
    }

    public function isAvailable($id)
    {
        $product = $this->getById($id);
        return $product->isAvailable;
    }
}
