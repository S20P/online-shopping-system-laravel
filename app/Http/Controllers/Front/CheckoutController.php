<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cart;
use App\Models\Orders as Order;
use App\Models\Products as Product;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Support\Facades\Input;
use Redirect;
use URL;
use Session;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{

    public function __construct(){
       
    }

    public function getCheckout()
    {
        return view('front.checkout');
    }


    public function placeOrder(CheckoutRequest $request)
    {
       $params =  $request->all();
        $order = Order::create([
        'order_number'      =>  'ORD-'.strtoupper(uniqid()),
        'user_id'           => auth()->user()->id,
        'status'            =>  'pending',
        'grand_total'       =>  Cart::getSubTotal(),
        'item_count'        =>  Cart::getTotalQuantity(),       
        'first_name'        =>  $params['first_name'],
        'last_name'         =>  $params['last_name'],
        'address'           =>  $params['address'],
        'city'              =>  $params['city'],
        'state'              =>  $params['state'],
        'country'           =>  $params['country'],
        'post_code'         =>  $params['post_code'],
        'phone_number'      =>  $params['phone_number'],
        'notes'             =>  $params['notes']
    ]);



        if ($order) {
              $items = Cart::getContent(); 


              foreach ($items as $item)
    		        {
    		        	  $product = Product::where('name', $item->name)->first();
    		        	   $orderItem = new OrderItem([
    			                'product_id'    =>  $product->id,
    			                'quantity'      =>  $item->quantity,
    			                'price'         =>  $item->getPriceSum(),
                          'order_id'      =>  $order->id
    			            ]);
                           
    		        	   $orderItem->save();
    		        }

                  return view('front.stripe',["params" => $params,"order_number"=> $order->order_number]);
                 // $this->stripe($order);

              
		    }
       
    }

       public function stripe($order)
      {

          return view('front.stripe',["params" => $params]);
      }

  







}
