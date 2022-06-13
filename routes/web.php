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

Route::get('user-boi-bai-tarot/{fb_uid}',[\App\Http\Controllers\TarotController::class,'showWithUser']);
Route::get('boi-bai-tarot/{id}',[\App\Http\Controllers\TarotController::class,'show']);
Route::get('boi-bai-tarot',[\App\Http\Controllers\TarotController::class,'index']);
Route::get('/{any}',[\App\Http\Controllers\TarotController::class,'index']);
