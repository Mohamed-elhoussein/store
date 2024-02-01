<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\WebController;
use App\Http\Controllers\web\ajaxController;
use App\Http\Controllers\web\CartController;

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





Route::controller(WebController::class)->group(function(){
Route::get("index","index")->name("web/index");
Route::post("ajaxCart","ajaxCart")->name("web/ajaxCart");
Route::get("register","register")->name("web/register");
Route::post("data","data")->name("web/data");
Route::get("login","login")->name("web/login");
Route::post("Check","Check")->name("web/Check");
});



Route::controller(ajaxController::class)->group(function(){
Route::post("dataCart","dataCart")->name("web/dataCart");
Route::post("remove","remove")->name("web/remove");
Route::post("search","search")->name("web/search");
});

Route::controller(CartController::class)->group(function(){
Route::get("item","item")->name("web/item");
});


