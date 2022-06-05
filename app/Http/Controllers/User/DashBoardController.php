<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use Auth;

class DashBoardController extends Controller
{  

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function dashboard()
    {
    	$user = Auth::user();
		
	    $total_orders = Orders::where('user_id',$user->id)->orderBy('id','desc')->count();

        $data['total_orders'] = $total_orders; 

        return view('user.dashboard',$data);
    }


    
}
