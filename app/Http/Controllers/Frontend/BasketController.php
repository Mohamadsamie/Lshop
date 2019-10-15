<?php

namespace App\Http\Controllers\Frontend;

use App\Address;
use App\City;
use App\Exceptions\QuantityExceededExeption;
use App\Product;
use App\Province;
use App\Support\Basket\Basket;
use App\Support\Payment\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class BasketController extends Controller
{
    private $basket;
    private $transaction;

    public function __construct(Basket $basket, Transaction $transaction)
    {
        $this->middleware('auth')->only('checkoutForm','checkout');
        $this->basket = $basket;
        $this->transaction = $transaction;
    }

    public function add(Product $product)
    {
        try {
            $this->basket->add($product, 1);
            return back()->with('success', __('payment.added to basket'));

        }catch (QuantityExceededExeption $e){
            return back()->with('error', __('payment.quantity exceeded'));

        }
    }

    public function index()
    {
        $items = $this->basket->all();
        return view('frontend.cart.index', compact('items'));
    }

    public function update(Request $request, Product $product)
    {
        if ($request->quantity >= 0 && $request->quantity != null){
            try {
                $this->basket->update($product, $request->quantity);
                return back();

            }catch (QuantityExceededExeption $e){
                return back()->with('error', __('payment.quantity exceeded'));

            }
        } else {
            return back()->with('error', __('payment.quantity exceeded'));
        }


    }

    public function checkoutForm()
    {
        $items = $this->basket->all();
        $user = User::with('addresses.province','addresses.city')->whereId(Auth::id())->get()->first();
//        $items = $this->basket->all();
//        dd($items);
        return view('frontend.cart.checkout', compact(['user','items']));
    }

    public function checkout(Request $request)
    {
        $this->validateForm($request);

        $order = $this->transaction->checkout();

        return redirect()->route('user.profile')->with('success', __('payment.your order has been registered', ['orderNum' => $order->id]));
    }



    private function validateForm($request)
    {
        $request->validate([
            'method' => ['required'],
            'gateway' => ['required_if:method,online']
        ]);
    }

    public function removeItem(Product $product)
    {
        $this->basket->removeProduct($product, 0);
//        Alert::toast('محصول مورد نظر با موفقیت حذف شد','success');
        return back();
    }

}
