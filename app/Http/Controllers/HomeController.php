<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class HomeController extends Controller
{
   
    public function index()
    {

    	$products = Products::orderBy('id','desc')->paginate(5);

        return view('home',compact('products'));
    }
}
