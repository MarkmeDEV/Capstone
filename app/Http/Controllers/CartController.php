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
    

    public function store(Request $request, $id) {
        $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
        $cartProducts = CartProduct::all();

        foreach($cartProducts as $product) {
            if($cart[0]->id == $product->cart_id) {
                if($product->product_id == $id) {
                    $existingCartProduct = cartProduct::find($product->id);
                    $existingCartProduct->quantity += $request->quantity;
                    $existingCartProduct->save();
                    return redirect('products/show/' . $id);
                }
            }
        }

        $cartProduct = new CartProduct();
        $cartProduct->cart_id = $cart[0]->id;
        $cartProduct->product_id = $id;
        $cartProduct->quantity = $request->quantity;
        $cartProduct->save();
        
        return redirect('products/show/' . $id);
    }

    public function destroy($id) {
        $cart = Cart::find(Auth::user()->id);
        $cartProducts = CartProduct::all();
        $products = Products::all();

        foreach($cartProducts as $key => $item) {
            if($item['cart_id'] == $cart['id']) {
                foreach($products as $product => $value) {
                    if($value['id'] == $id) {
                        $cartItem = CartProduct::find($item['id']);
                        $cartItem->delete();
                        return redirect('cart');
                    }
                }
            }
        }

        return redirect('cart');
    }
}
