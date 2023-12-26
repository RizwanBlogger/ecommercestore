<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class UserLoginController extends Controller
{
    public function login()
    {
        return view('frontend.pages.login');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],[
            'name.required' => 'Name is Required',
            'email.required' => 'Email is Required',
            'password.required' => 'Password is Required',
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $query = Customer::create($data);
        return redirect()->back()->with('message','Register Successful ');

    }
    public function customersignin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required'
        ]);
        $credential = $request->only('email','password');
        if(Auth::guard('customer')->attempt($credential)){
            return redirect()->route('front.index')->with('message','Login Successfull');
        }
        else{
            return redirect()->back();
        }
    }


}
