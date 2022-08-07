<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepo
{
    public function getAllPagination($per_page = 10)
    {
        return Product::latest()->paginate($per_page);
    }
}
