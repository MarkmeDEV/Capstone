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
    public function index(Request $request)
    {
        if (auth()->user()->role_id != 3) {
            return redirect()->route('inventory-list');
        }
    
        $products = Products::all();
        $productsImages = ProductImage::all();
        $items = [];
    
        foreach ($products as $product) {
            $images = [];
    
            foreach ($productsImages as $image) {
                if ($image['product_id'] == $product['id']) {
                    $images[] = $image['link'];
                }
            }
    
            $items[] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'description' => $product['description'],
                'tag' => $product['tag'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'images' => $images
            ];
        }
    
        // Filter by tag if a tag is specified and not "all"
        if ($request->has('tag') && $request->tag && $request->tag !== 'all') {
            $items = array_filter($items, function ($item) use ($request) {
                return $item['tag'] === $request->tag;
            });
        }

        if ($request->has('search-item') && $request->get('search-item') !== '') {
            $search = strtolower($request->get('search-item'));
            $items = array_filter($items, function ($item) use ($search) {
                return str_contains(strtolower($item['name']), $search) || 
                       str_contains(strtolower($item['description']), $search);
            });
        }
    
        return view('products.list', ['products' => $items]);
    }
    
}
