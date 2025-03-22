<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class frontcontroller extends Controller
{
    public function index(){
         $products = product::where('is_featured','yes')
         ->orderBy('id','DESC')->take(8)
         ->where('status',1)->get();
         $data['feturedproducts'] = $products;


         
         $leatest_products = product::orderBy('id','DESC')->where('status',1)
         ->take(4)->get();
         $data['leatest_products'] = $leatest_products;

        return view('front.home',$data);
    }
}


