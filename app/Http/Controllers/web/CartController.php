<?php

namespace App\Http\Controllers\web;

use App\Models\cart;
use App\Models\User;
use App\Models\image;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function item(){
        $user_id=Auth::guard("web")->user()->id;
        $data_cart= User::findOrfail($user_id)->with("products")->get();
        foreach($data_cart as $row){
          $all_img[]=product::where("id",$row->id)->with("images")->get();

             }

             return $all_img;
    }
}
