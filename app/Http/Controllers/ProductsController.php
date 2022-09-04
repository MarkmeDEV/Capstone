<?php

namespace App\Http\Controllers;

use App\Models\{
    ProductImage,
    Products
};

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function index() {
        $products = Products::all();
        $productsImages = ProductImage::all();
        $items = [];

        foreach($products as $product) {
            $images = [];
            
            foreach($productsImages as $image) {
                if($image['product_id'] == $product['id']) {
                    $images[] = $image['link'];
                }
            }
        
            $items[] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'description' => $product['description'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'images' => $images
            ];
        }

        return view('products.list', ['products' => $items]);
    }

    function show($id) {
        $products = Products::find($id);
        $productsImages = ProductImage::where('product_id', '=', $id)->get();
        $images = [];

        foreach($productsImages as $item) {
            $images[] = $item->link;
        }

        $product = [
            'id' => $products->id,
            'name' => $products->name,
            'description' => $products->description,
            'quantity' => $products->quantity,
            'price' => $products->price,
            'images' => $images
        ];

        return view('products.show', ['product' => $product]);
    }
}
