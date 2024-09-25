<?php

use Illuminate\Support\Facades\Route;
//CRUD DE LOS PRODUCTOS
use App\Http\Controllers\ProductController;
//CONTROL DEL LOGIN
use App\Http\Controllers\AuthController;


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
    return view('login');
});
//LOGIN CONTROL
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
//CRUD CONTROL
Route::apiResource('products', ProductController::class);
