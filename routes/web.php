<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;


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
    return redirect('/login');
})->name('login');

Route::get('/admin', function () {

    return view('admin.index',[
        'title' => 'Sansgen Admin',
    ]);
});

//Login
Route::get('login',[LoginController::class,'index'])->middleware('guest');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('logout',[LoginController::class,'logout']);