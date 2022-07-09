<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function index() {
        return view('products.list');
    }

    function show($id) {
        return view('products.show');
    }
}
