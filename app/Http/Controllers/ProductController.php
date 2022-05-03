<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function prod(){
        return "Products controller ";
    }

    public function contact(){
        return view("contact");
    }

    public function products(){
        return view('products', ["id"=> '30' ]);
    }
}
