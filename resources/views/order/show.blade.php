@extends('layouts.app')

@section('content')
<style>
/* Stepper Style */
.order-status-stepper {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    margin-bottom: 20px;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 10px;
    width: 30%;
    position: relative;
    opacity: 0.6; /* Make non-active steps faded */
    transition: opacity 0.3s ease;
}

.step.active {
    opacity: 1; /* Highlight active step */
    font-weight: bold;
    color: #007bff; /* Change color for active step */
}

.step::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #007bff;
    transition: background-color 0.3s ease;
}

.step.active::after {
    background-color: #28a745; /* Green for active */
}

/* Optional: Styling the estimated time */
.step-time {
    font-size: 0.9em;
    color: #555;
}

</style>
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <!-- User Info -->
            <div class="w-100">
                <p><strong>Name:</strong> {{ $data['user']['name'] }}</p>
                <p><strong>Address:</strong> {{ $data['orderAddress']['address'] }}</p>
                <p><strong>Zip code:</strong> {{ $data['orderAddress']['zipCode'] }}</p>
                <p><strong>Contact Number:</strong> {{ $data['user']['phoneNumber'] }}</p>
            </div>

            <!-- Order Table -->
            <table id="cart" class="w-100 mt-5">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-center">Unit Price</th>
                        <th class="text-center">Quantity</th>
                        @if($data['orderStatus'] == 'Received')
                            <th class="text-center">Feedback</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['products'] as $product)
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-3 product-images">
                                        <img class="d-inline w-100" src="{{ asset('images/' . ($product['images'][0] ?? 'alt-product.png')) }}" alt="Product Image">
                                    </div>
                                    <div class="col-md-9">
                                        <h5 class="font-weight-bold">{{ $product['name'] }}</h5>
                                        <p>{{ $product['description'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <i class="fa-solid fa-peso-sign"></i> {{ $product['price'] }}
                            </td>
                            <td class="text-center">
                                {{ $product['quantity'] }}
                            </td>
                            @if($data['orderStatus'] == 'Received')
                                <td class="text-center">
                                    @if(!$product['is_added_feedback'])
                                        <button class="btn btn-md mb-btn update-btn rate" type="button" data-toggle="modal" data-target="#rating" product-id="{{ $product['id'] }}" user-id="{{ Auth::user()->id }}">
                                            Rate
                                        </button>
                                    @else
                                        Done
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
             <!-- Order Status Stepper -->
             @if ($data['orderStatus'] !== 'To Pay')
                <div class="order-status-stepper">
                    <div class="step {{ $data['orderStatus'] == 'To Ship' ? 'active' : '' }}">
                        <span class="step-title">To Ship</span>
                        <span class="step-time">3-5 mins</span>
                    </div>
                    <div class="step {{ $data['orderStatus'] == 'To Receive' ? 'active' : '' }}">
                        <span class="step-title">To Receive</span>
                        <span class="step-time">1 Day</span>
                    </div>
                    <div class="step {{ $data['orderStatus'] == 'Completed' ? 'active' : '' }}">
                        <span class="step-title">Completed</span>
                        <span class="step-time">No Estimated Time</span>
                    </div>
                </div>
            @endif

        </div>

        {{-- <!-- Payment Form and Other Modals -->
        @include('modals.payment')
        @include('modals.rating') --}}
    </div>
</div>

@endsection
