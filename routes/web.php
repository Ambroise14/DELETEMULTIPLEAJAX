<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category/create',[categoryController::class,'create']);
Route::get('/category/all',[categoryController::class,'index']);
Route::get('/category/delete/{id}',[categoryController::class,'destroy']);
Route::get('/category/show/{id}',[categoryController::class,'show']);
Route::post('/category/store',[categoryController::class,'store']);


Route::get('/product/create',[productController::class,'create']);
Route::post('/product/store',[productController::class,'store']);
Route::post('/product/update/{id}',[productController::class,'update']);

Route::get('/product/all',[productController::class,'index']);
Route::get('/product/delete/{id}',[productController::class,'destroy']);
Route::get('product/deleteimg/{id}',[productController::class,'destroyimage']);

Route::post('product/deleteselectedproduct',[productController::class,'deletedmultiplleproduct']);
Route::get('product/showw/{id}',[productController::class,'show']);

Route::get('product/pdf',[productController::class,'getpdf']);





Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum','verified','authadmin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
