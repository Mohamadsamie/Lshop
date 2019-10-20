<?php

namespace App\Http\Controllers\Frontend;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
//    public function verify(){
//        $cart = Session::has('cart') ? Session::get('cart') : null;
//        if(!$cart){
//            Session::flash('warning', 'سبد خرید شما خالی است');
//            return redirect('/');
//        }
//
//        $productsId= [];
//
//        foreach ($cart->items as $product){
//            $productsId[$product['item']->id] = ['qty' => $product['qty']];
//        }
//
//        $order = new Order();
//        $order->amount = $cart->totalPrice;
//        $order->user_id = Auth::user()->id;
//        $order->status = 1;
//        $order->save();
//
//        $order->products()->sync($productsId);
//
//        $payment = new Payment($order->amount, $order->id);
//        $result = $payment->doPayment();
//
//        if ($result->Status == 100) {
//            return redirect()->to('https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
//        } else {
//            echo'ERR: '.$result->Status;
//        }
//
//    }

    public function getOrders()
    {
        $id = Auth::id();
//        $user = User::with('orders')->whereId($id)->get();
//        dd($user->orders());
        $orders = Order::with('user','payment')->where('user_id' , $id)->get();
        return view('frontend.profile.orders', compact('orders'));
    }

    public function getOrdersList($id)
    {
        $order = Order::with('products.photos')->whereId($id)->first();
//        dd($order);
        return view('frontend.profile.lists', compact('order'));
    }
}
