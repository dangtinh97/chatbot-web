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
})->name('photoshop.online');

Route::get('/boi-bai-tarot',[\App\Http\Controllers\TarotController::class,'index'])->name('other.tarot');

Route::group([
    'prefix' => '/game'
],function (){
    Route::get('/caro-online',[\App\Http\Controllers\GameCaroController::class,'playComputer'])->name('game.caro-online');
    Route::get('/flappy-bird',[\App\Http\Controllers\GameFlappyBirdController::class,'index'])->name('game.flappy-bird');
    Route::get('/dino',[\App\Http\Controllers\GameController::class,'dino'])->name('game.dino');
    Route::get('/2048',[\App\Http\Controllers\GameController::class,'game2048'])->name('game.2048');
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
        Route::get('/defined',[\App\Http\Controllers\Admin\BlockController::class,'defined'])->name('admin.block.defined');
    });
    Route::resource('/attachments',\App\Http\Controllers\AttachmentController::class);

});

Route::get('crawl/girl',[\App\Http\Controllers\CrawlController::class,'girl']);
Route::get("/anh-cua-tui",function (){
   return view('slider-image');
});

Route::get("/tinh-yeu-cua-anh",function (){
    return view('my-love');
});


Route::get('/{any}',[\App\Http\Controllers\DashboardController::class,'index']);
Route::get('',[\App\Http\Controllers\DashboardController::class,'index']);
