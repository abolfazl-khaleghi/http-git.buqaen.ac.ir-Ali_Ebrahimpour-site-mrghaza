<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Restaurant $restaurant){
        $comments  = $restaurant->comments->where('status','=','1');
        return view('restaurant',compact('restaurant','comments'));
    }
}
