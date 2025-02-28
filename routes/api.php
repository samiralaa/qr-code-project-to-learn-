<?php

use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Package\PackageController;
use App\Http\Controllers\Api\User\VCard\VCardController;
use App\Http\Middleware\ForceJsonResponse;
use Illuminate\Auth\Events\Login;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/generate-qrcode', [QRCodeController::class, 'generateQRCode']);


Route::get('category', [CategoryController::class, 'index']);

Route::controller(PackageController::class)
    ->prefix('packages')
    ->middleware(ForceJsonResponse::class)
    ->group(function () {
        Route::get('', 'index')->name('packages.index');
        Route::get('{id}', 'show')->name('packages.show');
        Route::post('', 'store')->name('packages.store');
        Route::put('{id}', 'update')->name('packages.update');
    });


Route::controller(RegisterController::class)
    ->prefix('users')
    ->group(function () {
        Route::get('', 'index')->name('users.index');
        Route::get('{id}', 'show')->name('user.show');
        Route::post('', 'register')->name('user.store');
        Route::put('{id}', 'update')->name('user.update');
    });



Route::middleware(ForceJsonResponse::class)->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout']);
    Route::post('refresh', [LoginController::class, 'refresh']);
});

Route::controller(VCardController::class)
    ->prefix('vcard')
    ->middleware(ForceJsonResponse::class)
    ->group(function () {
        Route::get('', 'index')->name('vcard.index');
        Route::get('{id}', 'show')->name('vcard.show');
        Route::post('', 'store')->name('vcard.store');
        Route::put('{id}', 'update')->name('vcard.update');
    });

// Route::get('v-card',V)Ca
