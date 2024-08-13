<?php

return [
    'account_id' => env('SMS_ACCOUNT_ID', 'account_id'),
    'password' => env('SMS_PASSWORD', 'password'),
    'sender' => env('SMS_SENDER', 'sender'),
    'callback_url' => env('SMS_CALLBACK_URL', 'https://your-site.com/reception'),
];
