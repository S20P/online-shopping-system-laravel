<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Orders;
use App\Models\User;
use App\Models\Products;
class AdminController extends Controller
{
     public function dashboard()
    {
    	 $total_orders = Orders::count();
    	 $total_customers = User::count();
    	 $total_products = Products::count();


        $data['total_orders'] = $total_orders; 
        $data['total_customers'] = $total_customers;
        $data['total_products'] = $total_products; 

        return view('admin.dashboard',$data);
    }

}
