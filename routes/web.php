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

Route::get('/', [\App\Http\Controllers\SearchMobileController::class, 'index'])->name('nguoi-la');
Route::get('/dieu-khoan-su-dung', function () {
    return view('search-mobile.dieukhoan');
})->name('dieu-khoan');

Route::get('/{mobile}', [\App\Http\Controllers\SearchMobileController::class, 'search'])->name('search');

Route::name('api.')->group(function () {
    Route::group([
        'prefix' => 'api'
    ], function () {
        Route::post('search/{mobile}', [\App\Http\Controllers\Api\SearchMobileController::class, 'search'])->name('search.store');

    });
});
