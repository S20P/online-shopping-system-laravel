<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
  

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function dashboard()
    {
        return view('user.dashboard');
    }
}
