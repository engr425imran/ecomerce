<?php

use App\Models\Bed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BedController;
use App\Http\Controllers\ChairController;

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
    return view('landing');
});


// getting chair and updaing etc
Route::get('/getchairs', [ChairController::class, 'index']);



// Route::get('/delete', [ChairController::class, 'removealldata']);
// Route::get('/delete', [BedController::class, 'removealldata']);
// CRUD BEDS Routes
Route::get('/getbeds', [BedController::class, 'index']);


Route::get('/shop', function () {
    return view('shop');
});


Route::get('/all', function(){
    return Bed::all();
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
