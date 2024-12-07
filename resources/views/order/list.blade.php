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
                            <th class="text-center">Products</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total Price</th>
                            <th class="text-center">Payment Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $order)
                            <tr>
                                <td class="text-center">
                                    {{ $order['id'] }}
                                </td>
                                <td class="text-center">
                                    <div>{{ $order['name'] }}</div>
                                </td>
                                <td class="text-center">
                                    {{ $order['quantity'] }}
                                </td>
                                <td class="text-center">
                                    <i class="fa-solid fa-peso-sign"></i> {{ $order['totalPrice'] }}
                                </td>
                                <td class="text-center">
                                    @if ($order['orderStatus'] == 'To Pay')
                                        <span class="badge badge-warning">To Pay</span>
                                    @elseif ($order['orderStatus'] == 'To Ship')
                                        <span class="badge badge-primary">To Ship</span>
                                    @elseif ($order['orderStatus'] == 'To Receive')
                                        <span class="badge badge-info">To Receive</span>
                                    @elseif ($order['orderStatus'] == 'Received')
                                        <span class="badge badge-success">Received</span>
                                    @else
                                        <span class="badge badge-secondary">{{ $order['orderStatus'] }}</span>
                                    @endif
                                </td>
                                
                                <td class="text-center">
                                    <form id="delete-user" action="{{ route('order-destroy', $order['id']) }}" method="POST">
                                        @csrf
                                        <a class="btn btn-sm mb-btn" href="{{ route('order-show', $order['id']) }}"><i class="fa-solid fa-eye"></i></a>
                                        <a href="#" class="btn btn-sm mb-btn delete-btn"><i class='bx bxs-trash delete'></i></a>
                                        <button type="submit" class="submit"></button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Stepper UI Below the Table -->

                        @empty
                            <h5 class="text-center">No Order List</h5>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>   
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

        $(document).ready( function () {
            $('#cart').DataTable();
        });

        $('.submit').hide();

        $('.delete-btn').click(function() {
            $('.submit').click();
        });
    </script>
@endsection
