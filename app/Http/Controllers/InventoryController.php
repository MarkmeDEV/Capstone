<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductImage;

class InventoryController extends Controller
{
    function index(){
        $products = Products::join('product_images', 'products.id', '=', 'product_images.product_id')
        ->get();
        return view('inventory.list', ['products' => $products]);
    }
}
