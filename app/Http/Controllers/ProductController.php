<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Stripe;
use Session;
use Exception;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products/products', compact('products'));
    }

    public function buy($id) {
        $product = Product::where('id', $id)->first();
        return view('products/buy', compact('product'));
    }

    /*public function purchase(Request $request)
    {
        $user = User::where('id', 1)->first();
        $input = $request->all();
        $token =  $request->stripeToken;
        $paymentMethod = $request->paymentMethod;
        try {

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
            if (is_null($user->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer(array(
                    'name' => 'test',
                    'description' => 'test description',
                    'email' => $email,
                    'source' => $token,
                    "address" => ["city" => $city, "country" => $country, "line1" => $address, "line2" => "", "postal_code" => $zipCode, "state" => $state]
                ));
            }

            \Stripe\Customer::createSource(
                $user->stripe_id,
                ['source' => $token]
            );

            $user->newSubscription('test',$input['plane'])
                ->create($paymentMethod, [
                'email' => $user->email,
            ]);

            return back()->with('success','Subscription is completed.');
        } catch (Exception $e) {
            return back()->with('success',$e->getMessage());
        }
            
        //return view('products/buy');
    }*/

    public function checkout($id)
    {
        $productItems = [];
 
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
 
        $product = Product::where('id', $id)->first();
        $user = User::where('id', 1)->first();
 
        $product_name = $product->name;
        $unit_amount = $product->price * 100;
        $quantity = 1;

        //$two0 = "00";
        //$unit_amount = "$total$two0";

        $productItems[] = [
            'price_data' => [
                'product_data' => [
                    'name' => $product_name,
                ],
                'currency'     => 'INR',
                'unit_amount'  => $unit_amount,
            ],
            'quantity' => $quantity
        ];

        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items'            => [$productItems],
            'mode'                  => 'payment',
            'allow_promotion_codes' => true,
            'metadata'              => [
                'user_id' => $user->id
            ],
            'customer_email' => $user->email,
            'success_url' => route('success'),
            'cancel_url'  => route('cancel'),
        ]);

        return redirect()->away($checkoutSession->url);
    }
 
    public function success()
    {
        return 'Success';
    }
 
    public function cancel()
    {
        return "Cancelled";
    }
}
