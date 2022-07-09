@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-4">
            <div class="card float-right w-100">
                <img src="{{ asset('img/liptint_1.jpg') }}" class="card-img-top" alt="..." style="height: 100%; width: 100%;">
                <!-- <div class="card-body">
                    <h5 class="card-title font-weight-bold">HD Matte Lip Tint</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div> -->
            </div>
        </div>
        <div class="col-md-8">
            <div class="card h-100">
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
            </div>
        </div>
    </div>
</div>
@endsection
    
@section('after-content')
    <script>
        
        
        $('#btn-increase').click(function () {
            let quantityElement = $('#quantity');
            let quantityValue = Number($('#quantity').val()) + 1;
            quantityElement.val(quantityValue);
        });

        $('#btn-decrease').click(function () {
            if(Number($('#quantity').val()) > 0) {
                let quantityElement = $('#quantity');
                let quantityValue = Number($('#quantity').val()) - 1;
                quantityElement.val(quantityValue);
            }   
        });

        $('.cart-btn').click(function (){
            if(Number($('#quantity').val()) > 0) {
                toastr.success('Product added to cart!');
            } else {
                toastr.error('Add Quantity!');
            }
        });
        
    </script>
@endsection
