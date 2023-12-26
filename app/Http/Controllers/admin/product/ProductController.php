<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.pages.product.list',compact('product'));
    }
    public function create()
    {
        $category = Category::all();
        return view('admin.pages.product.create',compact('category'));
    }
    public function submit(Request $request)
    {
        $request->validate([
            'productname' => 'required',
            'productprice' => 'required',
           
            'category_id' => 'required',
            'productdesc'=>'required',
        ],
        [
            'productname' => 'Product Name is Required',
            'productprice' => 'Product Price is Required',
           
            'category_id' => 'Product Category id is Required',
            'productdesc' => 'Product Description is Required',
        ]);

        $data = $request->except('_token');
        if($request->file('image')){
        $imageName = time() . '.' . $request->image->extension();
        $data['image'] = $imageName;
        $request->image->move(public_path('image/product'), $imageName);
        }
        $query = Product::create($data);
        if(isset($query) && !empty($query))
        return redirect()->route('admin:product.list')->with('message','Product Successfull add');
    else
    return redirect()->back()->with('error','All Fields are Required');
    }

    public function edit($id)
    {
       
        $edit = Product::find($id);
        $category = Category::all();
        return view('admin.pages.product.update',compact('edit','category'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'productname' => 'required',
            'productprice' => 'required',
           
            'category_id' => 'required',
            'productdesc'=>'required',
        ],
        [
            'productname' => 'Product Name is Required',
            'productprice' => 'Product Price is Required',
           
            'category_id' => 'Product Category id is Required',
            'productdesc' => 'Product Description is Required',
        ]);
        $data = $request->except('_token');
        if(isset($data['image'])&& !empty($data['image'])){
            $oldimage = Product::find($id);
            if(isset($oldimage->image)&& !empty($oldimage->image)){
                $lodimage = public_path('image/product/'.$oldimage);
                if(File::exists($oldimage)){
                    File::delete($oldimage);
                }
            }
            $imageName = time() . '.' . $request->image->extension();
            $data['image'] = $imageName;
            $request->image->move(public_path('image/product'), $imageName);
        }
        $query = Product::where("id",$id)->update($data);
        if(isset($query) && !empty($query))
        if(isset($query) && !empty($query))
        return redirect()->route('admin:product.list')->with('message','Product Successfull add');
    else
    return redirect()->back()->with('error','All Fields are Required');
    }
    public function destory($id)
    {
        $data = Product::findOrFail($id);
        $item = $data->delete();
        if (isset($item) && !empty($item)) {
            return response(['status' => true]);
        } else {
            return response(['status' => false]);
        }           
    }
}

