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
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="w-100 mt-4 pb-5">
                <button class="btn btn-md mb-btn float-right cancel-order-btn">Cancel Order</button>
                <button class="btn btn-md mb-btn float-right mr-2" data-toggle="modal" data-target="#exampleModal">Pay</button>
                <span class="float-right mr-4 mt-2 font-weight-bold">Total: <i class="fa-solid fa-peso-sign"></i> 99999999</span>
                <h3 class="mr-4 font-weight-bold text-center"><strong>Status:</strong> To Pay</h3>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="#" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Payment Form</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center font-weight-bold">Send Payment through GCASH</p>
                                <p>Name: Juan Dela Cruz</p>
                                <p>GCash Number: 09XXXXXXXXX</p>
                                <label for="reference-number">Reference Number:</label>
                                <input id="reference-number" class="form-control" type="text"  name="reference-number">
                                <label for="reference-proof-image" class="mt-3">Upload Screenshot:</label>
                                <input id="reference-proof-image" class="form-control" type="file"  name="reference-proof-image">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn mb-btn payment-submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
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
        $('.payment-submit-btn').click(function(e) {
            e.preventDefault();
            toastr.success('Payment has been submitted and will refresh the page!');
        });

        $('.cancel-order-btn').click(function(e) {
            toastr.success('Order has been cancelled!');
        });
    </script>
@endsection
