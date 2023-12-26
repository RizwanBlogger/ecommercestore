<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.pages.category.list',compact('category'));
    }

    public function create()
    {
        return view('admin.pages.category.create');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ],[
            'name.required' => 'category is required',
        ]);
        $data = $request->all();
        $query = Category::create($data);
        if(isset($query) && !empty($query))
        return redirect()->route('admin:category.list')->with('message','Category successfull create');
    else
    return redirect()->back()->with('error','All field is required');
    }

    public function edit($id)
    {
        $edit = Category::find($id);
        return view('admin.pages.category.update',compact('edit'));
    }

    public function update(Request $request,$id)
    {
        $data = Category::where('id',$id)->update($request->except('_token'));

        if(isset($data) && !empty($data))
        return redirect()->route('admin:category.list')->with('message','Category successfull update');
        else
        return redirect()->back()->with('error','All field is required');
    }

    public function destory($id)
    {
        $data = Category::findOrFail($id);
        $item = $data->delete();
        if (isset($item) && !empty($item)) {
            return response(['status' => true]);
        } else {
            return response(['status' => false]);
        }           
    }

}
