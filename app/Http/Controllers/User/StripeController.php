<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class StripeController extends Controller
{
    // 
    public function StripeOrder(Request $request){


        if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
    	}

        // Set your secret key. Remember to switch to your live secret key in production.
            // See your keys here: https://dashboard.stripe.com/apikeys
            \Stripe\Stripe::setApiKey('sk_test_51JORmvIHSqkWHSrjbcZW1TcMlL7Cif9xjzvoJNNHL3WmAxTywGhwnPnA6A2GRfUJI2n9jiai0jLSec3HiSOxTIdp00G9D9C1Cf');

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
                $token = $_POST['stripeToken'];
                $charge = \Stripe\Charge::create([                
                  'amount' => $total_amount*100,
                  'currency' => 'usd',
                  'description' => 'Shop Now',
                  'source' => $token,     
                  'metadata' => ['order_id' => uniqid()],
                ]);

            // dd($charge);


         
            
            
            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'state_id' => $request->state_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'post_code' => $request->post_code,
                'notes' => $request->notes,
       
                'payment_type' => 'Stripe',
                'payment_method' => 'Stripe',
                'payment_type' => $charge->payment_method,
                'transaction_id' => $charge->balance_transaction,
                'currency' => $charge->currency,
                'amount' => $total_amount,
                'order_number' => $charge->metadata->order_id,
       
                'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
                'order_date' => Carbon::now()->format('d F Y'),
                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'status' => 'Pending',
                'created_at' => Carbon::now(),	 
       
            ]);


   // Start Send Email 
   $invoice = Order::findOrFail($order_id);
   $data = [
       'invoice_no' => $invoice->invoice_no,
       'amount' => $total_amount,
       'name' => $invoice->name,
       'email' => $invoice->email,
   ];

   Mail::to($request->email)->send(new OrderMail($data));

   // End Send Email 




            // order submit options
            $carts = Cart::content();
                foreach ($carts as $cart) {
                    OrderItem::insert([
                        'order_id' => $order_id, 
                        'product_id' => $cart->id,
                        'color' => $cart->options->color,
                        'size' => $cart->options->size,
                        'qty' => $cart->qty,
                        'price' => $cart->price,
                        'created_at' => Carbon::now(),

                    ]);
                }


                if (Session::has('coupon')) {
                    Session::forget('coupon');
                }

                Cart::destroy();

                $notification = array(
                        'message' => 'Your Order Submit Successfully',
                        'alert-type' => 'success'
                    );

                    return redirect()->route('dashboard')->with($notification);



    }// end mathod



} // end main
