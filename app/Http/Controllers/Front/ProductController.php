<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function findProductBySlug($slug)
	{
	     $product = Products::where('slug', $slug)->first();

	     return view('front.product.show', compact('product'));
	}

	public function addToCart(Request $request)
	{
	    $product = $this->productRepository->findProductById($request->input('productId'));
	    $options = $request->except('_token', 'productId', 'price', 'qty');

	    Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

	    return redirect()->back()->with('message', 'Item added to cart successfully.');
   }


}
