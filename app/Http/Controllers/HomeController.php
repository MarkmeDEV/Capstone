<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    ProductImage,
    Products
};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role_id != 3) {
            return redirect()->route('inventory-list');
        }
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

        return view('products.list', ['products' => $items] );
    }
}
