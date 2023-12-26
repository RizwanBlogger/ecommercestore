<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $product = Product::all();
        return view('frontend.pages.index',compact('category','product'));
    }
    public function detail($id)
    {
        $product_detail = Product::find($id);
        $category = Category::all();
        return view('frontend.pages.productdetail',compact('product_detail','category'));
    }
}
