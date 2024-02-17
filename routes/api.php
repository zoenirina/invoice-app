<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/showcustomer',[CustomerController::class,'show']);
Route::post('/storecustomer',[CustomerController::class,'store']);
Route::post('/updatecustomer',[CustomerController::class,'update']);
Route::post('/deletecustomer',[CustomerController::class,'delete']);

Route::post('/showproduct',[ProductController::class,'show']);
Route::post('/storeproduct',[ProductController::class,'store']);
Route::post('/updateproduct',[ProductController::class,'update']);
Route::post('/deleteproduct',[ProductController::class,'delete']);

Route::post('/getinvoice',[InvoiceController::class,'show']);

Route::post('/register',[authController::class,'register']);