<?php

use App\Http\Middleware\ChackAge;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddelware;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\Api\User\VCard\VCardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('get/vcards',[VCardController::class, 'index']);
Route::get('/qr-form', function () {
    return view('qr-form');
})->name('generate.qrcode.form');

Route::post('/generate-qrcode', [QRCodeController::class, 'generateQRCode'])->name('generate.qrcode');

// dashboar

