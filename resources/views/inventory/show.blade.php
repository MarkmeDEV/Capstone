@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="card w-100">
            <!-- <div class="card-header">
                <a href="{{ route('inventory-create') }}" class="btn mb-btn btn-sm float-right">Add Product</a>
            </div> -->
            <div class="card-body">
                <div class="row">
                  <div class="col-md-4 pb-3">
                    <div class="product-images w-100">
                        @foreach($product['images'] as $image)
                        <div class="carousel-cell">
                          <img src="{{ asset("images/$image") }}" alt="product-image" height="250"/>
                        </div>
                        @endforeach
                    </div>
                  </div>
                  <div class="col-md-8 d-flex flex-column">
                    <div class="mb-auto">
                      <h5 class="card-text"><strong>Name:</strong> {{ $product['name'] }} </h5>
                      <p class="card-text"><strong>Description:</strong> {{ $product['description'] }}</p>
                      <p class="card-text"><strong>Price:</strong> {{ $product['price'] }}</p>
                      <p class="card-text"><strong>Stock:</strong> {{ $product['quantity'] }}</p>
                    </div>
                    <div class="w-100 justify-content-center" style="display: flex; align-items: center; justify-content-end">
                      <form id="delete-user" action="{{ route('inventory-destroy', $product['id']) }}" method="POST">
                        @csrf
                        <a class="btn mb-btn btn-md mr-3" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <a class="btn mb-btn btn-md mr-3 delete-btn" href="#"><i class="fa-solid fa-trash"></i> Delete</a>
                        <a class="btn mb-btn btn-md" href="#" onclick="window.history.back()"><i class="fa-solid fa-angle-left"></i> Back</a>
                        <button type="submit" class="submit">
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-content')
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script>
    $('.product-images').flickity({
      // options
      cellAlign: 'center',
      contain: true
    });

    $('.submit').hide();


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
  </script>
@endsection
