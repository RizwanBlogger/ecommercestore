<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CustomerDashboardController extends Controller
{
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/')->with('success', "Logout Successfully!");
    }
}
