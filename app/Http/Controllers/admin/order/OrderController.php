<?php

namespace App\Http\Controllers\admin\order;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status','0')->get();
        return view('admin.pages.order.orderlist',compact('orders'));
    }
    public function view($id)
    {
      $orders = Order::where('id',$id)->first();
      return view('admin.pages.order.view',compact('orders'));
    }
    public function status(Request $request,$id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order-status');
        $orders->update();
        return redirect()->route('admin:all.orders')->with('message','Order status update');
    }

    public function history()
    {
        $orders = Order::where('status','1')->get();
        return view('admin.pages.order.orderhistory',compact('orders'));
    }
}
