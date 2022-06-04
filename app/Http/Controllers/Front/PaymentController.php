<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Cart;
use App\Models\Orders as Order;
use App\Models\Products as Product;
use App\Models\OrderItem;
use App\Models\Payment;
use Redirect;
use URL;
use Session;
use Stripe;

class PaymentController extends Controller
{
    public function __construct(){
    
    }

        public function stripePost(Request $request)
      {
             
           $input = $request->all();

           $order_number = $input['order_number'];

           if(isset($input['param'])){

                $params = json_decode($input['param']);

                  $email  = \Auth::user()->email;
                  $first_name  = $params->first_name;
                  $last_name =  $params->last_name;
                  $address = $params->address;
                  $city =  $params->city;
                  $country = $params->country;
                  $post_code =   $params->post_code;
                  $phone_number =  $params->phone_number;
                  $notes =  $params->notes;


           $grand_total =  Cart::getSubTotal();  

          // dd($grand_total);  
           $amountToBePaid = sprintf('%0.2f', $grand_total);

            $currency_from = generalSetting('currency');

            $currency = $currency_from ? $currency_from : "INR";
           
         $stripeClient = new \Stripe\StripeClient(env('STRIPE_SECRET'));
         $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

          // $customer = \Stripe\Customer::create([
          //     // 'email' => $email,
          //     'name' => $first_name." ".$last_name,
          //     'description' =>   $notes ,
          //      "source" => $request->stripeToken,
          //       'address' => [
          //       'line1' =>  $address ?  $address : '510 Townsend St',
          //       'postal_code' => $post_code ? $post_code : '98140',
          //       'city' => $city ? $city  : 'San Francisco',
          //       'state' => 'CA',
          //       'country' => $country ? $country : 'US',
          //     ],
          // ]);
        

         $stripeCharge =  Stripe\Charge::create ([
                  // "amount" => 100*100,
                  "amount" => $amountToBePaid * 100,
                  "currency" => $currency,
                  "source" => $request->stripeToken,
                  "description" => $notes ? $notes : "This is Online shoping payment",

          ]);
     
        if( $stripeCharge){

           if($stripeCharge['status']=="succeeded"){

       $paymentId = $stripeCharge['id'];
        

        $order = Order::where('order_number', $order_number)->first();
        $order->status = 'completed';
        $order->save();

        $payment = new Payment;
        $payment->order_id = $order->id;
        $payment->payment_status = "succeeded";
        $payment->payment_name = "Stripe";
        $payment->payment_id = $stripeCharge['id'];
        $payment->payment_method = $stripeCharge['payment_method'];
        $payment->payment_date = date("Y-m-d");
        $payment->customer_id  = \Auth::user()->id;
        $payment->customer_name  = \Auth::user()->name;
        $payment->save();

        Cart::clear();

         Session::flash('success', 'Payment Successful !');

        return view('front.payment-success', compact('order'));

                 }

        }

           session()->flash('error', 'Payment failed');
         
           
         return Redirect::route('home');


       }
      }


}
