<?php

use Illuminate\Support\Facades\Route;
use vendor\OtpSystem\Http\Controllers\OtpController;

Route::post('otp/request', [OtpController::class, 'requestOtp']);
Route::post('otp/verify', [OtpController::class, 'verifyOtp']);
