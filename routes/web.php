<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ HomeController::class,"index"]);
Route::get('/redirect',[ HomeController::class,"redirect"]);
Route::get('/users',[ UserController::class,"users"]);
Route::get('/deactivate/{id}',[UserController::class,"deactivate"]);
Route::get('/activate/{id}',[UserController::class,"activate"]);
Route::get('/edituser/{id}',[UserController::class,"edituser"]);
Route::post('/saveuser/{id}',[UserController::class,"saveuser"]);
Route::get('/logout',[ UserController::class,"logout"]);
Route::get('/foodmenu',[ ProductController::class,"foods"]);
Route::post('/addcat',[ ProductController::class,"addcat"]);
Route::post('/savecat/{id}',[ ProductController::class,"savecat"]);
Route::post('/addfood',[ ProductController::class,"addfood"]);
Route::get('/editfood/{id}',[ ProductController::class,"editfood"]);
Route::post('/savefood/{id}',[ ProductController::class,"savefood"]);
Route::get('/disablefood/{id}',[ ProductController::class,"disablefood"]);
Route::get('/enablefood/{id}',[ ProductController::class,"enablefood"]);
Route::get('/reservations',[ ReserveController::class,"reservations"]);
Route::post('/reserve',[ ReserveController::class,"reserve"]);
Route::get('/orders',[ OrderController::class,"orders"]);
Route::post('/searchorders',[ OrderController::class,"searchorders"]);
Route::post('/addcart/{id}',[ OrderController::class,"addCart"]);
Route::get('/showcart',[ OrderController::class,"showCart"]);
Route::get('/dropcart/{id}',[ OrderController::class,"dropCart"]);
Route::post('/checkout',[ OrderController::class,"checkout"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
