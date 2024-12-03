<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Cart,
    CartProduct,
    Products,
    ProductImage
};

class CartController extends Controller
{

    function index() {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
    
        // Handle the case where the cart is not found
        if (!$cart) {
            return view('cart.show', ['products' => null]);
        }
    
        $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
        $products = Products::all();
        $productImages = ProductImage::all();
    
        $data = [];
        $data['id'] = $cart->id;
        $data['data'] = [];
        $totalPrice = 0;
    
        foreach ($cartProducts as $item) {
            foreach ($products as $product) {
                if ($product->id == $item->product_id) {
                    $images = [];
                    foreach ($productImages as $image) {
                        if ($image->product_id == $product->id) {
                            $images[] = $image->link;
                        }
                    }
    
                    $data['data'][] = [
                        'id' => $product->id,
                        'name' => $product->name,
                        'description' => $product->description,
                        'price' => $product->price,
                        'quantity' => $item->quantity,
                        'images' => $images,
                    ];
                    $totalPrice += ($product->price * $item->quantity);
                }
            }
        }
    
        $data['totalPrice'] = $totalPrice;
    
        return view('cart.show', ['products' => $data]);
    }
    
    public function store(Request $request, $id)
    {
        // Fetch the cart for the authenticated user
        $cart = Cart::where('user_id', Auth::id())->first();
    
        // If no cart exists, create one
        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::id();
            $cart->save();
        }
    
        // Fetch all cart products for this cart
        $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
    
        // Check if the product already exists in the cart
        foreach ($cartProducts as $product) {
            if ($product->product_id == $id) {
                // Update quantity if product exists
                $product->quantity += $request->quantity;
                $product->save();
                return redirect('cart')
                    ->with('success', 'Product quantity updated in cart.');
            }
        }
    
        // Add a new product to the cart if it doesn't already exist
        $cartProduct = new CartProduct();
        $cartProduct->cart_id = $cart->id;
        $cartProduct->product_id = $id;
        $cartProduct->quantity = $request->quantity;
        $cartProduct->save();
    
        return redirect('cart')
            ->with('success', 'Product added to cart.');
    }
    

    public function destroy($id) {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
    
        if (!$cart) {
            return redirect('cart')->with('error', 'Cart not found.');
        }
    
        $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
        $product = Products::find($id);
    
        if (!$product) {
            return redirect('cart')->with('error', 'Product not found.');
        }
    
        foreach ($cartProducts as $item) {
            if ($item->product_id == $id) {
                $item->delete();
                return redirect('cart')->with('success', 'Product removed from cart.');
            }
        }
    
        return redirect('cart')->with('error', 'Product not found in cart.');
    }
    
}
