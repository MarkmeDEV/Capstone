@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="card w-100">
            <div class="card-header">
                <a href="{{ route('user-create') }}" class="btn mb-btn btn-sm float-right"><i class="fa-solid fa-plus"></i> User Administrator</a>
            </div>
            <div class="card-body">
                <table id="cart" class="w-100 row-border product-list">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Phone Number</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach($users as $data)
                            <tr class="mb-bb-1 font-weight-bold">
                                <td class="text-center">
                                  {{   $data['name'] }}
                                </td>
                                <td class="text-center">
                                  {{ $data['email'] }}
                                </td>
                                <td class="text-center">
                                  {{ $data['role'] }}
                                </td>
                                <td class="text-center">
                                  {{ $data['phone_number'] }}
                                </td>
                                <td class="text-center">
								  <form id="" action="{{ route('user-delete', $data['id']) }}" method="POST">
                                    @csrf
                                    <a class="btn btn-sm mb-btn" href="{{ route('user-show',  $data['id']) }}"><i class="fa-solid fa-eye"></i></a>
                                    <button type="submit" class="submit">
                                    </button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
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
        $('.delete-btn').click(function(e) {
            // swal({
            //     title: "Are you sure you want to cancel the order?",
            //     text: "",
            //     icon: "warning",
            //     buttons: true,
            //     dangerMode: true,
            // }).then((willDelete) => {
            //     if (willDelete) {
            //         swal("Product has been deleted!", {
            //         icon: "success",
            //         });
                    
            //         const xhttp = new XMLHttpRequest();
            //         xhttp.onload = function() {
                        
            //         }
            //         xhttp.open("GET", "ajax_info.txt", true);
            //         xhttp.send();
            //     }
            // });
						$('.submit').click();
        });

        $('.checkout-btn').click(function() {
            toastr.success('Products are moved to orders!');
        });

        $(document).ready( function () {
            $('.product-list').DataTable();
        });

		$('.submit').hide();
    </script>
    <style>
    </style>
@endsection
