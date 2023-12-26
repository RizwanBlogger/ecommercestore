<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('admin.pages.auth.login');
    }
    public function submit(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)){

            $status = Auth::guard('web')->user()->status;
            if (isset($status) && $status != 0) {
                $message = "User Login Successfully";

            } else {
                Auth::guard('web')->logout();
                return redirect()->back()->with('error','Unactive Email');
            }
         } else{
            return redirect()->back()->with('error','Invalid Email/Password');
        }
        return redirect()->route('admin:dashboard')->with('message',$message);

    }
}
