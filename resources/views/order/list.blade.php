@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="w-100">
                <table id="cart" class="w-100 mt-5">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total Price</th>
                            <th class="text-center">Payment Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                1
                            </td>
                            <td class="text-center">
                                8
                            </td>
                            <td class="text-center">
                                <i class="fa-solid fa-peso-sign"></i> 999
                            </td>
                            <td class="text-center">
                                To Pay
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm mb-btn" href="{{ route('order-show', '2') }}"><i class="fa-solid fa-eye"></i></a>
                                <button class="btn btn-sm mb-btn delete-btn" href=""><i class="fa-solid fa-ban"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                2
                            </td>
                            <td class="text-center">
                                8
                            </td>
                            <td class="text-center">
                                <i class="fa-solid fa-peso-sign"></i> 999
                            </td>
                            <td class="text-center">
                                To Pay
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm mb-btn" href="{{ route('order-show', '2') }}"><i class="fa-solid fa-eye"></i></a>
                                <button class="btn btn-sm mb-btn delete-btn"><i class="fa-solid fa-ban"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                3
                            </td>
                            <td class="text-center">
                                8
                            </td>
                            <td class="text-center">
                                <i class="fa-solid fa-peso-sign"></i> 999
                            </td>
                            <td class="text-center">
                                To Pay
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm mb-btn" href="{{ route('order-show', '2') }}"><i class="fa-solid fa-eye"></i></a>
                                <button class="btn btn-sm mb-btn delete-btn"><i class="fa-solid fa-ban"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                4
                            </td>     
                            <td class="text-center">
                                8
                            </td>
                            <td class="text-center">
                                <i class="fa-solid fa-peso-sign"></i> 999
                            </td>
                            <td class="text-center">
                                To Pay
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm mb-btn" href="{{ route('order-show', '2') }}"><i class="fa-solid fa-eye"></i></a>
                                <button class="btn btn-sm mb-btn delete-btn"><i class="fa-solid fa-ban"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
    
@section('after-content')
    <script>
        $('.delete-btn').click(function() {
            swal({
                title: "Are you sure you want to cancel the order?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal("Order has been cancelled!", {
                    icon: "success",
                    });
                }
            });
        });

        $('.checkout-btn').click(function() {
            toastr.success('Products are moved to orders!');
        });
    </script>

    <style>
    </style>
@endsection
