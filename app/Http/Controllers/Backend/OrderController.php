<?php

namespace App\Http\Controllers\Backend;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('payment')->orderBy('id', 'desc')->paginate(10);
        return view('admin.orders.index', compact(['orders']));
    }

    public function getOrderLists($id)
    {
        $order = Order::with('user.addresses.province',
            'user.addresses.city',
            'products.photos')->whereId($id)->first();
//        dd($order);
        return view('admin.orders.list', compact('order'));

    }
}
