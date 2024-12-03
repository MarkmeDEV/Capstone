<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductImage;
use App\Models\feedback;
use App\Models\UserPersonalInformation;

class InventoryController extends Controller
{
    function index(){
        // $products = Products::join('product_images', 'products.id', '=', 'product_images.product_id')
        // ->get();
        $products = Products::all();
        return view('inventory.list', ['products' => $products]);
    }

    function create() {
        return view('inventory.create');
    }

    function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'unitPrice' => 'required',
            'tag' => 'nullable|string', 
        ]);

        $products = new Products();
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->unitPrice;
        $products->quantity = $request->quantity;
        $products->tag = $request->input('tag');
        $products->save();

        if($request->hasfile('filename'))
        {
            $productImageCount = 0;
            foreach($request->file('filename') as $image)
            {
                $name= $request->name . '-' . $productImageCount . '.' . $image->getClientOriginalExtension();
                $image->move(public_path().'/images/', $name);
                $data[] = $name;
                $productImageCount++;

                $productImage = new ProductImage();
                $productImage->link = $name;
                $productImage->product_id = $products->id;
                $productImage->save();
            }
        }

        return redirect('inventory');
    }

    function show($id) {
        $data = Products::find($id);
        $productImages = ProductImage::where('product_id', '=', $id)->get();
        $feedback = feedback::where('product_id', '=', $id)->get();
        $images = [];
        $feedbacks = [];

        foreach($productImages as $item) {
            $images[] = $item->link;
        }
        
        $product = [
            'id' => $data->id,
            'name' => $data->name,
            'description' => $data->description,
            'tag' => $data->tag,
            'quantity' => $data->quantity,
            'price' => $data->price,
            'images' => $images
        ];

        foreach($feedback as $rating) {

            $user = UserPersonalInformation::find($rating->person_information_id);
            
            $feedbacks[] = [
                'rating' => $rating->star,
                'message' => $rating->message,
                'customer_name' => $user->first_name . ' ' . $user->last_name,
            ];
        }

        return view('inventory.show', ['product' => $product, 'feedbacks' => $feedbacks]);
    }
    
    function destroy($id) {
        $product = Products::find($id);
        $product->delete();

        $products = Products::all();

        return redirect('inventory');
    }
}
