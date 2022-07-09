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
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="d-inline w-100" src="{{ asset('img/liptint_1.jpg') }}" alt="Product Image">
                                    </div>
                                    <div class="col-md-9">
                                        <h5 class="font-weight-bold">HD Matte Lip Tint</h5>
                                        <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div>
                                </div>
                            </td>
                            <td class="text-center">
                                <i class="fa-solid fa-peso-sign"></i> 999
                            </td>
                            <td class="text-center">
                                8
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm mb-btn delete-btn"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="d-inline w-100" src="{{ asset('img/liptint_1.jpg') }}" alt="Product Image">
                                    </div>
                                    <div class="col-md-9">
                                        <h5 class="font-weight-bold">HD Matte Lip Tint</h5>
                                        <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div>
                                </div>
                            </td>
                            <td class="text-center">
                                <i class="fa-solid fa-peso-sign"></i> 999
                            </td>
                            <td class="text-center">
                                8
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm mb-btn delete-btn"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="d-inline w-100" src="{{ asset('img/liptint_1.jpg') }}" alt="Product Image">
                                    </div>
                                    <div class="col-md-9">
                                        <h5 class="font-weight-bold">HD Matte Lip Tint</h5>
                                        <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div>
                                </div>
                            </td>
                            <td class="text-center">
                                <i class="fa-solid fa-peso-sign"></i> 999
                            </td>
                            <td class="text-center">
                                8
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm mb-btn delete-btn"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="d-inline w-100" src="{{ asset('img/liptint_1.jpg') }}" alt="Product Image">
                                    </div>
                                    <div class="col-md-9">
                                        <h5 class="font-weight-bold">HD Matte Lip Tint</h5>
                                        <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div>
                                </div>
                            </td>
                            <td class="text-center">
                                <i class="fa-solid fa-peso-sign"></i> 999
                            </td>
                            <td class="text-center">
                                8
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm mb-btn delete-btn"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="w-100 mt-4 pb-5">
                <button class="btn btn-md mb-btn float-right checkout-btn">Checkout</button>
                <span class="float-right mr-4 mt-2 font-weight-bold">Total: <i class="fa-solid fa-peso-sign"></i> 99999999</span>
                
            </div>
            <!-- <div class="card h-100">
                <div class="card-body" style="background-color: #FEE3EC;">
                    <h5 class="card-title font-weight-bold">HD Matte Lip Tint</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text"><strong>Price:</strong> 999</p>
                    <p class="card-text"><strong>Stock:</strong> 999</p>
                    <p class="card-text">
                        <strong>Quantity:</strong> 
                        <button id="btn-decrease" class="btn mb-border-black-1 mb-btn"style="padding: 0px 5px;"><i class="fa-solid fa-minus"></i></button>
                        <input id="quantity" type="text" name="quantity" value="0" placeholder="0" style="width: 30px;">
                        <button id="btn-increase" class="btn mb-border-black-1 mb-btn" style="padding: 0px 5px;"><i class="fa-solid fa-plus"></i></button>
                    </p>
                    <div class="w-100 justify-content-center" style="display: flex; align-items: center;">
                        <button class="btn btn-md mb-btn cart-btn">ADD TO CART</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
    
@section('after-content')
    <script>
        $('.delete-btn').click(function() {
            swal({
                title: "Are you sure you want to remove the product?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal("Product has been removed!", {
                    icon: "success",
                    });
                }
            });
        });

        $('.checkout-btn').click(function() {
            toastr.success('Products are moved to orders!');
        });
    </script>
@endsection
