<?php

namespace App\Http\Controllers\dashboard\auth;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loginontroller extends Controller
{
    public function index()
    {
        return view('dashboard.login');
    }

    public function login(Request $request){
        $data_login=["email"=>$request->email, "password"=>$request->password];
        if(Auth::guard('admin')->attempt($data_login)){
            return redirect()->route('admin.index')->with("ms_admin","success login");
        }else{
            return redirect()->route('dash/login')->with("ms_admin","the email or password is incorrect");
        }
    }


}
