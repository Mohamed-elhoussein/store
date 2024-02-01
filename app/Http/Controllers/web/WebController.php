<?php

namespace App\Http\Controllers\web;

use App\Models\cart;
use App\Models\User;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function index()
    {
        // $id_login=Auth::guard("web")->user()->id;
        // return cart::where("user_id",$id_login)->with("products.images")->get();
        $data=product::with("images")->paginate(2);
         return view('web.index',["data"=>$data]);

    }

    public function register(){
        return view('web.register');
    }

    public function data(Request $request){
        User::create($request->toArray());
        return redirect()->route('web/index');
    }

    public function login(){
        return view('web.login');
    }

public function Check(Request $request){
if(Auth::guard('web')->attempt(["email"=>$request->input('email'),"password"=>$request->input('password')])){
    return redirect()->route('web/index');

}else{
    return redirect()->route('web/login');
}
}


}
