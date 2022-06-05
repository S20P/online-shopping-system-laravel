<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use Auth;

class OrderController extends Controller
{
    public function index()
	{


       $user = Auth::user();
		
	    $orders = Orders::where('user_id',$user->id)->orderBy('id','desc')->paginate(5);

	    return view('user.pages.orders.index', compact('orders'));
	}

	public function show($orderNumber)
	{
	    $order = Orders::where('id',$orderNumber)->first();

	    return view('user.pages.orders.show', compact('order'));
	}
}
