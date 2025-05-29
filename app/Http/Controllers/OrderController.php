<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = []; // Replace with Order::all();

        return view('orders.index', compact('orders'));
    }
}

