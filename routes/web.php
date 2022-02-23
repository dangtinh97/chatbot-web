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


Route::get('/dieu-khoan-su-dung', function () {
    return view('search-mobile.dieukhoan');
})->name('dieu-khoan');

Route::get('/tra-sdt', [\App\Http\Controllers\SearchMobileController::class, 'index'])->name('nguoi-la');

Route::name('api.')->group(function () {
    Route::group([
        'prefix' => 'tra-sdt'
    ], function () {
        Route::post('search', [\App\Http\Controllers\Api\SearchMobileController::class, 'search'])->name('search.store');
        Route::post('vote',[\App\Http\Controllers\Api\SearchMobileController::class,'vote'])->name('search.mobile.vote');
    });
});

Route::get('/',[\App\Http\Controllers\LiveChatController::class,'index']);
Route::get('/{mobile}', [\App\Http\Controllers\SearchMobileController::class, 'search'])->name('search');


Route::post('end-chat-single',[\App\Http\Controllers\Api\ChatController::class,'endChat'])->middleware('auth')->name('api.end-chat-single');
Route::post('set-wait-connect',[\App\Http\Controllers\Api\UserController::class,'setWaitConnect'])->middleware('auth')->name('api.set-wait-connect');
