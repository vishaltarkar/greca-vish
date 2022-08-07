<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Models\Product;
use App\Repository\ProductRepo;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function __construct()
    {
        $this->product = new ProductRepo();
    }

    /**
     * Get a list of products with pagination
     *
     * @param Request $request
     * @return void
     */
    public function paginateList(Request $request)
    {
        $products = $this->product->getAllPagination($request->get('per_page', 10));
        $products = new ProductCollection($products);
        return response()->json($products, 200);
    }
}
