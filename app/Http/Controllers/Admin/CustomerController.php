<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
	{
	    $customers = User::orderBy('id','desc')->paginate(5);

	    return view('admin.pages.customers.index', compact('customers'));
	}
}
