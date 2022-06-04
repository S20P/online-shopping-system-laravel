<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Orders;

class OrderController extends Controller
{
    public function index()
	{
	    $orders = Orders::orderBy('id','desc')->paginate(5);;

	    return view('admin.orders.index', compact('orders'));
	}

	public function show($orderNumber)
	{
	    $order = Orders::where('id',$orderNumber)->first();

	    return view('admin.orders.show', compact('order'));
	}
}
