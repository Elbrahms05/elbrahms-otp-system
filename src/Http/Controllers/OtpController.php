<?php

namespace vendor\OtpSystem\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OtpSystem;

class OtpController extends Controller
{
    public function requestOtp(Request $request)
    {
        $request->validate(['phone' => 'required|numeric']);

        $otp = OtpSystem::generateOtp($request->phone);
        OtpSystem::sendOtp($request->phone, $otp);

        return response()->json(['message' => 'OTP sent']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['phone' => 'required|numeric', 'otp' => 'required|numeric']);

        if (OtpSystem::verifyOtp($request->phone, $request->otp)) {
            return response()->json(['message' => 'OTP verified']);
        }

        return response()->json(['message' => 'OTP incorrect'], 400);
    }
}
