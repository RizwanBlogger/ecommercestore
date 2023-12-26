<?php

namespace App\Http\Controllers\frontend\checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {

        $cartitem = Cart::where('user_id',Auth::guard('customer')->id())->get();

        return view('frontend.pages.checkout',compact('cartitem'));
    }
    function placeorder(Request $request)
    {
        $order = new Order();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phonenumber = $request->input('phonenumber');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->user_id = Auth::guard('customer')->id();
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $total = 0;
        $cartitem_total = Cart::where('user_id',Auth::guard('customer')->id())->get();
        foreach($cartitem_total as $prod)
        {
            $total +=$prod->getProduct->productprice * $prod->product_qty;

        }

        $order->total_price = $total;
        $order->tracking_no = 'PK-DEX'.rand(111111,999999);
        $order->save();


        $cartitem = Cart::where('user_id',Auth::guard('customer')->id())->get();
        foreach($cartitem as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'qty' => $item->product_qty,
                'price' => $item->getProduct->productprice,
            ]);
        }
        if(Auth::guard('customer')->user()->address1 == NULL)
        {
            $User = Customer::where('is',Auth::guard('customer')->id())->first();
            $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->phonenumber = $request->input('phonenumber');
        $User->address1 = $request->input('address1');
        $User->address2 = $request->input('address2');
        $User->city = $request->input('city');
        $User->state = $request->input('state');
        $User->country = $request->input('country');
        $User->pincode = $request->input('pincode');
        $user->update();
        }
        $cartitem = Cart::where('user_id',Auth::guard('customer')->id())->get();
        Cart::destroy($cartitem);
        return redirect('/')->with('message','Order Placed Successfully');

    }
}
