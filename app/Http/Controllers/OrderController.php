<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    CartProduct,
    Order,
    OrderAddress,
    OrderPayment,
    OrderProduct,
    PaymentImage,
    Products,
    ProductImage,
    User,
    UserPersonalInformation
};
use DateTime;
use DateTimeZone;

class OrderController extends Controller
{
    function index()
{
    $orders = Order::where('user_id', '=', Auth::user()->id)->get();

    // dd($orders); // Dump the orders for debugging

    $data = [];
    foreach ($orders as $order) {
        $orderItems = $order->orderProducts; // Access the related orderProducts
        $quantity = 0;
        $totalPrice = 0;

        foreach ($orderItems as $orderItem) {
            $quantity += $orderItem->quantity;
            $totalPrice += ($orderItem->quantity * $orderItem->price);
        }

        $data[] = [
            'id' => $order->id,
            'name' => $order->product_name,
            'quantity' => $quantity,
            'totalPrice' => $totalPrice,
            'orderStatus' => $order->order_status,
            'products' => $orderItems->map(function($item) {
                return [
                    'name' => $item->product->name,
                    'quantity' => $item->quantity,
                ];
            }),
        ];
    }

    return view('order.list', ['data' => $data]);
}
    
    function show($id) {
        $orderItem = Order::find($id);

        $orderAddress = OrderAddress::where('order_id', '=', $orderItem->id)->get();
        $orderPayment = OrderPayment::where('order_id', '=', $orderItem->id)->get();
        $orderProducts = OrderProduct::where('order_id', '=', $orderItem->id)->get();

        $orderShippingAddress = $orderAddress[0]->street . ', ' . $orderAddress[0]->barangay . ', ' . $orderAddress[0]->city . ', ' . $orderAddress[0]->province;
        $zipCode = $orderAddress[0]->zip_code;
        $shippingAddress = [
            'address' => $orderShippingAddress,
            'zipCode' => $zipCode
        ];

        $user = User::find($orderItem->user_id);
        $user = UserPersonalInformation::find($user->user_personal_information_id);
        $fullName = $user->first_name . ' ' . ($user->middle_name ?? '') . ' ' . $user->last_name;
        $contactNumber = $user->phone_number;
        $user = [
            'name' => $fullName,
            'phoneNumber' => $contactNumber
        ];

        $products = [];
        $totalPrice = 0;
        foreach($orderProducts as $order) {
            $product = Products::where('id', '=', $order->product_id)->get();

            $productImages = ProductImage::where('product_id', '=', $order->product_id)->get();
            $images = [];
            $is_added_feedback = $order->is_added_feedback;
            foreach($productImages as $image) {
                $images[] = $image->link;
            }
            $totalPrice += ($order->quantity * $order->price);
            $products[] = [
                'id' => $product[0]->id,
                'name' => $product[0]->name,
                'description' => $product[0]->description,
                'quantity' => $order->quantity,
                'price' => $order->price,
                'is_added_feedback' => $order->is_added_feedback,
                'images' => $images
            ];
        }

        $data = [
            'id' => $id,
            'products' => $products,
            'name' => $orderItem->name ?? 'Order Name',
            'totalPrice' => $totalPrice,
            'orderStatus' => $orderItem->order_status,
            'orderAddress' => $shippingAddress,
            'user' => $user
        ];
        // dd($data);
        return view('order.show', ['data' => $data]);
    }

    function store(Request $request, $id) {
        $request->validate([
            'street' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'zip_code' => 'required',
        ]);
    
        $cartProducts = CartProduct::where('cart_id', '=', $id)->get();
    
        $dt = new DateTime("now", new DateTimeZone('Asia/Manila'));
    
        $newOrder = new Order();
        $newOrder->user_id = Auth::user()->id;
        $newOrder->order_status = 'To Pay';
        $newOrder->ordered = $dt->format('Y-m-d H:i:s');
        $newOrder->received = null;
    
        // Capture the product names and store them in a comma-separated string
        $productNames = $cartProducts->map(function($cartProduct) {
            $product = Products::find($cartProduct->product_id);
            return $product->name; // Assuming the 'name' field exists in the 'products' table
        })->implode(', ');
    
        $newOrder->product_name = $productNames; // Save the product names as a string
        $newOrder->save();
    
        $orderAddress = new OrderAddress();
        $orderAddress->order_id = $newOrder->id;
        $orderAddress->street = $request->street;
        $orderAddress->barangay = $request->barangay;
        $orderAddress->city = $request->city;
        $orderAddress->province = $request->province;
        $orderAddress->zip_code = $request->zip_code;
        $orderAddress->save();
    
        $orderPayment = new OrderPayment();
        $orderPayment->order_id = $newOrder->id;
        $orderPayment->payment_status = 'To Pay';
        $orderPayment->save();
    
        $paymentImage = new PaymentImage();
        $paymentImage->order_payment_id = $orderPayment->id;
        $paymentImage->link = null;
        $paymentImage->save();
    
        foreach($cartProducts as $cartProduct) {
            $product = Products::find($cartProduct->product_id);
    
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $newOrder->id;
            $orderProduct->product_id = $product->id;
            $orderProduct->quantity = $cartProduct->quantity;
            $orderProduct->price = $product->price;
            $orderProduct->save();
    
            $cartItem = CartProduct::find($cartProduct->id);
            $cartItem->delete();
        }
    
        // Prepare data to send to the view
        $orders = Order::where('user_id', '=' , Auth::user()->id)->get();
        $data = [];
        foreach($orders as $order) {
            $orderItems = OrderProduct::where('order_id', '=', $order->id)->get();
            $quantity = 0;
            $totalPrice = 0;
            foreach($orderItems as $orderItem) {
                $quantity += $orderItem->quantity;
                $totalPrice += ($orderItem->quantity * $orderItem->price);
            }
            $data[] = [
                'id' => $order->id,
                'quantity' => $quantity,
                'totalPrice' => $totalPrice,
                'orderStatus' => $order->order_status,
                'productName' => $order->product_name, // Add the product_name to the data
            ];
        }
    
        return view('order.list', ['data' => $data]);
    }

    function destroy($id) {
        $order = Order::find($id);
        $order->delete();

        return redirect('orders');
    }

    function payment(Request $request, $id) {

        $paymentImage = PaymentImage::find($id);
        if($paymentImage) {
            if($request->hasfile('reference_proof_image'))
            {
                $name ='payment-' . $id . '.' . $request->file('reference_proof_image')->getClientOriginalExtension();
                $request->file('reference_proof_image')->move(public_path().'/images/payment/', $name);
                $paymentImage->link = $name;
                $paymentImage->save();
            }
        } else {
            $paymentImage = new PaymentImage();
            if($request->hasfile('reference_proof_image'))
            {
                $name ='payment-' . $id . '.' . $request->file('reference_proof_image')->getClientOriginalExtension();
                $request->file('reference_proof_image')->move(public_path().'/images/payment/', $name);
                $paymentImage->link = $name;
                $paymentImage->save();
            }
        }

        return redirect("orders/show/$id");
    }
}
