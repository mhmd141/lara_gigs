<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
//Route::get('/user/{name}', function () {
//   return view('user');
//});

Route::get('/',[HomeController::class,'index']);
Route::get('/create',[HomeController::class,'create'])->name('create');
Route::post('/createpost',[HomeController::class,'store'])->name('createpost');
Route::get('/show/{id}',[HomeController::class,'show'])->name('show');
Route::get('/manage',[HomeController::class,'manage'])->name('manage');
Route::get('/edit/{id}',[HomeController::class,'edit'])->name('edit');
Route::post('/edit/{id}',[HomeController::class,'update'])->name('update');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/loginPost',[UserController::class,'loginPost'])->name('loginPost');
Route::get('/register',[UserController::class,'register'])->name('registerPost');
Route::post('/registerPost',[UserController::class,'register'])->name('registerPost');





//Route::resource('test','app/Http/Controllers/TestController');
//Route::get('/',[UserController::class,'index']);
//Route::get('/user/create',[UserController::class,'create']);
//Route::get('/user/{id}',[UserController::class,'show']);
//Route::resource('users',UserController::class);
