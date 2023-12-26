<?php

namespace App\Http\Controllers\admin\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard.index');
    }
    public function logout()
    {

        if (Auth::guard('web')->check()) {

            Auth::guard('web')->logout();
            return redirect('/admin/login')->with('message', 'User logout');
        }
    }
}
