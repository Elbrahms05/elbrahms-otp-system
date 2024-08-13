<?php

namespace vendor\OtpSystem;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class OtpSystem
{
    public function generateOtp($phone)
    {
        $otp = rand(100000, 999999);
        Cache::put('otp_' . $phone, $otp, 300); // Store for 5 minutes

        return $otp;
    }

    public function sendOtp($phone, $otp)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://lamsms.lafricamobile.com/api', [
            'accountid' => config('otpsystem.account_id'),
            'password' => config('otpsystem.password'),
            'sender' => config('otpsystem.sender'),
            'ret_id' => 'Push_1',
            'ret_url' => config('otpsystem.callback_url'),
            'priority' => '2',
            'text' => 'Votre code OTP est ' . $otp,
            'to' => [
                [
                    'ret_id_1' => $phone,
                ]
            ]
        ]);

        return $response->successful();
    }

    public function verifyOtp($phone, $otp)
    {
        return Cache::get('otp_' . $phone) == $otp;
    }
}
