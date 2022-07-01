<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    'prefix' => '/game'
],function (){
    Route::post('score',[\App\Http\Controllers\GameFlappyBirdController::class,'saveScore'])->name('api.game.save_score');
});

Route::group([
    'prefix' => 'admin'
],function (){
    Route::post('/login',[\App\Http\Controllers\Api\AuthController::class,'attempt'])->name('api.admin.login');
});

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth.api'
],function (){
    Route::post('/attachments',[\App\Http\Controllers\AttachmentController::class,'store'])->name('api.attachments.post');
    Route::group([
        'prefix' => 'block'
    ],function (){
        Route::post('default',[\App\Http\Controllers\Admin\BlockController::class,'defaultStore'])->name('api.default.store');
    });
});

Route::post('/attachments',[\App\Http\Controllers\AttachmentController::class,'store'])->name('api.attachment-user.post');
