<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::with('products')->where('id', $id)->first();;

        return view('front.category', compact('category'));
    }
}
