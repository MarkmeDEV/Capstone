@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-end mt-2">
        <div class="col-md-3">
            <div class="w-100">
                <form action="{{ route('products.filter') }}" method="GET">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend cursor-pointer">
                            <button type="submit" class="input-group-text search-bg border-0">
                                <i class="fa-solid fa-magnifying-glass search-btn"></i>
                            </button>
                        </div>
                        <input 
                            class="form-control" 
                            type="text" 
                            name="search-item" 
                            placeholder="Search" 
                            value="{{ request('search-item') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <!-- Tag Buttons -->
        <div class="col-md-12 mb-4">
    <div class="d-flex flex-wrap">
        <!-- Button for "All" products -->
        <form action="{{ route('products.filter') }}" method="GET" class="mr-2">
            <input type="hidden" name="tag" value="all">
            <button class="btn btn-outline-secondary {{ request('tag') == 'all' || !request('tag') ? 'active' : '' }}">
                All Products
            </button>
        </form>

        <!-- Button for "Cleaning" products -->
        <form action="{{ route('products.filter') }}" method="GET" class="mr-2">
            <input type="hidden" name="tag" value="Cleaning">
            <button class="btn btn-outline-primary {{ request('tag') == 'Cleaning' ? 'active' : '' }}">
                Cleaning
            </button>
        </form>

        <!-- Button for "Beauty" products -->
        <form action="{{ route('products.filter') }}" method="GET" class="mr-2">
            <input type="hidden" name="tag" value="Beauty">
            <button class="btn btn-outline-primary {{ request('tag') == 'Beauty' ? 'active' : '' }}">
                Beauty
            </button>
        </form>

        <!-- Button for "Personal Care" products -->
        <form action="{{ route('products.filter') }}" method="GET" class="mr-2">
            <input type="hidden" name="tag" value="Personal Care">
            <button class="btn btn-outline-primary {{ request('tag') == 'Personal Care' ? 'active' : '' }}">
                Personal Care
            </button>
        </form>

        <!-- Button for "Others" products -->
        <form action="{{ route('products.filter') }}" method="GET" class="mr-2">
            <input type="hidden" name="tag" value="Others">
            <button class="btn btn-outline-primary {{ request('tag') == 'Others' ? 'active' : '' }}">
                Others
            </button>
        </form>
    </div>
</div>

    </div>
    <div class="row mt-3">
        @foreach($products as $product) 
            <div class="col-md-3 mt-5">
                <a href="{{ route('product-show', $product['id']) }}">
                    <div class="card product-card">
                        <img src="{{ asset('images/' . ($product['images'][0] ?? 'alt-product.png')) }}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
