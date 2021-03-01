<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Pizza;
use App\User;
use Log;

class OrderController extends Controller
{
    //
    function addOrder(Request $request){
        Auth::user();
        $order = new Order();
        $user = User::where('id', '=', Auth::user()->id)->first();
        
        $this->validate($request, [
            'quantity' => 'required|min:1'
        ]);
        
        if(Order::all()->isEmpty()){
            $order->order_id = 1;
        }
        else{
            if(Order::where('active', true)->first() == null){
                $lastOrder = Order::latest('updated_at')->first();
                $order->order_id = $lastOrder->order_id + 1;
            }
            else{
                $lastOrder = Order::where('user_id', '=', $user->id)->where('active', true)->first();
                $order->order_id = $lastOrder->order_id;
            }
        }

        $order->user_id = $user->id;
        $order->pizza_id = $request->pizza_id;
        $order->quantity = $request->quantity;
        $order->active = true;

        $order->save();

        return redirect('/');
    }

    function showCart(){
        Auth::user();
        $user = User::where('id', '=', Auth::user()->id)->first();
        $order = Order::where('user_id', '=', $user->id)->where('active', true)->get();

        return view('viewCart', compact('order'));
    }

    function updateOrder(Request $request){
        $order = Order::where('id', '=', $request->o_id)->first();

        $this->validate($request, [
            'quantity' => 'required|min:1'
        ]);
        
        $order->quantity = $request->quantity;
        $order->save();
        
        return redirect('/view/cart');
    }

    function deleteOrder(Request $request){
        Order::find($request->o_id)->delete();

        return redirect('/view/cart');
    }

    function checkout(){
        Auth::user();
        $user = User::where('id', '=', Auth::user()->id)->first();
        $order = Order::where('user_id', '=', $user->id)->where('active', true)->get();

        foreach($order as $o){
            $o->active = false;
            $o->save();
        }

        return redirect('/');
    }

    function showTransaction($id){
        $order = Order::where('user_id', '=', $id)->where('active', false)->get()->unique('order_id');

        return view('viewTransaction', compact('order'));
    }

    function showTransactionDetails($order_id){
        $order = Order::where('order_id', '=', $order_id)->get();

        return view('viewTransactionDetails', compact('order'));
    }

    function showAllTransaction(){
        $order = Order::get()->unique('order_id');
        
        return view('viewAllTransaction', compact('order'));
    }
}
