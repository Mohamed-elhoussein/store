<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\auth\loginontroller;
use App\Http\Controllers\dashboard\admin\adminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.index');
});

Route::resource("admin",adminController::class)->middleware('auth_admin');

Route::controller(loginontroller::class)->middleware('guest:admin')->group(function(){
Route::get("login","index")->name("dash/login");
Route::post("login/check","login")->name("dash/login/check");
Route::get("test","test")->name("dash/test");
});
