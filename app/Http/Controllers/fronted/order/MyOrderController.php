<?php

namespace App\Http\Controllers\fronted\order;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id',Auth::guard('customer')->id())->get();
        return view('frontend.pages.order',compact('orders'));
    }
    public function view($id)
    {
        $orders = Order::where('id',$id)->where('user_id',Auth::guard('customer')->id())->first();
        return view('frontend.pages.view',compact('orders'));
    }
}
