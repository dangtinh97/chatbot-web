<?php

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
Route::get('photoshop-online',function (){
    return view('photoshop');
});


Route::get('sua-anh-online',function (){
    return view('photoshop');
});

Route::get('user-boi-bai-tarot/{fb_uid}',[\App\Http\Controllers\TarotController::class,'showWithUser']);
Route::get('boi-bai-tarot/{id}',[\App\Http\Controllers\TarotController::class,'show']);
Route::get('boi-bai-tarot',[\App\Http\Controllers\TarotController::class,'index']);
Route::get('/caro-online/',[\App\Http\Controllers\GameCaroController::class,'playComputer']);
Route::get('/caro-online/{fb_uid}',[\App\Http\Controllers\GameCaroController::class,'playComputer']);
Route::group([
    'prefix' => '/game'
],function (){
    Route::get('/flappy-bird',[\App\Http\Controllers\GameFlappyBirdController::class,'index']);
    Route::get('/dino',[\App\Http\Controllers\GameController::class,'dino']);
});

Route::group([
    'prefix' => 'admin'
],function(){
   Route::get('/login',[\App\Http\Controllers\Admin\AuthController::class,'login'])->name('admin.login');
   Route::post('/login',[\App\Http\Controllers\Admin\AuthController::class,'attempt'])->name('admin.attempt');
});

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth'
],function(){
    Route::get('/',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.dashboard');
    Route::group([
        'prefix' => '/blocks'
    ],function (){
        Route::get('/menu',[\App\Http\Controllers\Admin\BlockController::class,'menu'])->name('admin.block.menu');
    });

});


Route::get('/{any}',[\App\Http\Controllers\TarotController::class,'index']);
Route::get('',[\App\Http\Controllers\TarotController::class,'index']);
