<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Auth::user()->orders()->with('items.product')->latest()->get();

        return view('orders.index', compact('orders'));
    }
    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Order $order)
    {
        // Ensure the authenticated user owns the order
        if (Auth::id() !== $order->user_id) {
            abort(403);
        }

        // Eager load the items and their products
        $order->load('items.product');

        return view('orders.show', compact('order'));
    }
}
