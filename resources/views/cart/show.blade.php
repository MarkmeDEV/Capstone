@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="w-100">
                <table id="cart" class="w-100 mt-5">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Unit Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($products['data']) && is_array($products['data']))
                            @foreach ($products['data'] as $product)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3 product-images w-25">
                                            <div class="carousel-cell">
                                                <img class="d-inline w-100" src="{{ asset('images/' . ($product['images'][0] ?? 'alt-product.png')) }}" alt="Product Image">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <h5 class="font-weight-bold">{{ $product['name'] }}</h5>
                                            <p>{{ $product['description'] }}</p>
                                        <div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <i class="fa-solid fa-peso-sign"></i> 
                                    <span>{{ $product['price'] }}</span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $product['quantity'] }}</span>
                                </td>
                                <td class="text-center">
                                    <form id="delete-user" action="{{ route('cart-product-destroy', $product['id'])}}" method="POST">
                                        @csrf
                                        <a href="#" class="btn btn-sm mb-btn delete-btn"><i class='bx bxs-trash delete' ></i></a>
                                        <button type="submit" class="submit"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center"><h3>No Products Yet</h3></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            @if (!empty($products['data']) && is_array($products['data']))
                <div class="w-100 mt-4 pb-5">
                    <button class="btn btn-md mb-btn float-right checkout-btn" data-toggle="modal" data-target="#exampleModal">Checkout</button>
                    <span class="float-right mr-4 mt-2 font-weight-bold">
                        Total: <i class="fa-solid fa-peso-sign"></i>{{ $products['totalPrice'] ?? 0 }}
                    </span>
                </div>
            @else
                <div class="w-100 mt-4 pb-5">
                    <h3 class="text-center">No products available.</h3>
                </div>
            @endif
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delivery Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('order-store', $products['id'] ?? '') }}" method="POST">

                        @csrf
                            <div class="mb-3">
                                <label for="street">Street:</label>
                                <input type="text" name="street" id="street" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="barangay">Barangay:</label>
                                <input type="text" name="barangay" id="barangay" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="city">City:</label>
                                <input type="text" name="city" id="city" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="province">Province:</label>
                                <input type="text" name="province" id="province" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="zip_code">Zip code:</label>
                                <input type="text" name="zip_code" id="zip_code" class="form-control" required>
                            </div>    
                            <button type="submit" class="checkout-order"></button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn mb-btn checkout">Submit</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    
@section('after-content')
    <script>
        $('.submit').hide();
        $('.checkout-order').hide();

        $('.checkout').click(function() {
            $('.checkout-order').click();
        });

        $('.delete-btn').click(function(e) {
			$('.submit').click();
        });

        $('.checkout-btn').click(function() {
            toastr.success('Products are moved to orders!');
        });
    </script>
@endsection
