<?php

namespace App\Http\Controllers\frontend\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function cart()
    {
        $cartitem = Cart::where('user_id',Auth::guard('customer')->id())->get();
        return view('frontend.pages.cart',compact('cartitem'));
    }
    public function addtocart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if(Auth::guard('customer')->check())
        {
            $product_check = Product::where('id',$product_id)->exists();
            if($product_check)
            {
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::guard('customer')->id())->exists())
                {
                    return redirect()->back()->with('message','Product already exist');
                }
                else
                {
                    $cartitem = new Cart();
                    $cartitem->product_id = $product_id;
                    $cartitem->user_id = Auth::guard('customer')->id();
                    $cartitem->product_qty = $product_qty;
                    $cartitem->save();
                    return redirect()->back()->with('message','item added to cart');
                }
            }
           
        }
        else
        {
            return redirect()->route('login')->with('error','Please Login');
        }
    }

    public function deleteproduct($id)
    {
        $deleteproduct = Cart::findorFail($id);
        $productitem = $deleteproduct->delete();
        if(isset($productitem) && !empty($productitem))
        {
            return response(['status'=> true]);
        }
        else
        {
            return response(['status'=> false]);
        }
    }
}
