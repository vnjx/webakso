<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        $user_id     = auth()->user();
        $productItems = [];

         \Stripe\Stripe::setApiKey(config('stripe.sk'));
 
        foreach (session('cart') as $id => $details) {
 
            $product_name = $details['namaproduk'];
            $total = $details['price'];
            $quantity = $details['quantity'];
 
            $two0 = "00";
            $unit_amount = "$total$two0";
 
            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
                    ],
                    'currency'     => 'IDR',
                    'unit_amount'  => $unit_amount,
                ],
                'quantity' => $quantity
            ];
        }
 
        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items'            => $productItems,
            'mode'                  => 'payment',
            'allow_promotion_codes' => false,
            'metadata'              => [
                'user_id' => "0001"
            ],
            'customer_email' => "$user_id->email",
            'success_url' => route('success', [], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url'  => route('cancel', [], true),
        ]);

        return redirect()->away($checkoutSession->url);
    }
 
    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $sessionId = $request->get('session_id');

        $sessionId = \Stripe\Checkout\Session::allLineItems($sessionId);
        return view('success');
    }

    public function cancel()
    {
        return view('cancel');
    }
}
