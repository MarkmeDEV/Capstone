<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index() {
        return view('order.list');     
    }

    function show($id) {
        return view('order.show');
    }
}
