<?php

namespace App\Http\Controllers\frontend\rating;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->product_rating;
        dd($stars_rated);
        $product_id = $request->product_id;
    }
}
