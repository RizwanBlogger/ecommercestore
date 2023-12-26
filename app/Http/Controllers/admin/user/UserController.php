<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
       return view('admin.pages.user.list',compact('user'));
    }
    public function create()
    {
        return view('admin.pages.user.create');
    }
    public function submit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'name.required' => 'Name is Required',
            'email.required' => 'Emain is Required',
            'password.required' => 'Password is Required'
        ]);
        $data = $request->all();
        $query = User::create($data);
        if(isset($query) && !empty($query))
        return redirect()->route('admin:user.list')->with('message','User Register successfull');
    else
    return redirect()->back()->with('error','All field is required');

    }
    public function edit($id)
    {
        $edit = User::find($id);
        return view('admin.pages.user.update',compact('edit'));
    }
    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
           
        ],[
            'name.required' => 'Name is Required',
            'email.required' => 'Emain is Required',
            
        ]);
        
        $query = User::where('id',$id)->update($request->except('_token'));
        if(isset($query) && !empty($query)){
            return redirect()->route('admin:user.list')->with('message','User data Successful update');
        }
        else{
            return redirect()->back()->with('error','All fields required');
        }
    }

        public function destory($id)
            {
                $data = User::findOrFail($id);
                $item = $data->delete();
                if (isset($item) && !empty($item)) {
                    return response(['status' => true]);
                } else {
                    return response(['status' => false]);
                }           
            }
}
