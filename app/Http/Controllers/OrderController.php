<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function getOrders(){
        $orders = Order::all();
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view ('products.orders', ['orders'=>$orders]);
    }

    public function deleteOrder($id){
        Order::destroy($id);
        return redirect()->route('profile');
    }
}
