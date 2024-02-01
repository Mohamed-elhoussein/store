<?php

namespace App\Http\Controllers\web;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ajaxController extends Controller
{
    public function dataCart(Request $req){
        $id_user=Auth::guard('web')->user()->id;
        $cart_data=cart::where("product_id",$req->product_id)->where("user_id",$id_user)->first();
        if($cart_data){
            $cart_data->increment("count");
        }else{
            $cart=new cart();
            $cart->user_id = $id_user;
            $cart->product_id=$req->product_id;
            $cart->count=1;
            $cart->save();

        }
        return "success add to cart";
    }


    public function remove(Request $req){
        $id_user=Auth::guard('web')->user()->id;
         DB::table("carts")
         ->where("product_id",$req->id_pro)
         ->where("user_id",$id_user)->delete();
    }

    public function search(Request $req){
        if(!empty($req->search)){
            $search=$req->search;
            $data=DB::table("products")->where("name",'like',"%$search%")->get(["name","id"]);

            foreach($data as $row){
                echo "
                <a href='' class='list-group-item list-group-item-action'>$row->name</a>
                ";
            }

        }else{
            echo " ";
        }
    }

}
