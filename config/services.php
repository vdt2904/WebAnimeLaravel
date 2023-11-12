<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '4699946153-is5ho2nsq8e400brkd2qd78ek2k6486h.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/callback/google',
    ],
    'facebook' => [
        'client_id' => '1453253075218684',
        'client_secret' => 'fea5ede4226bf958c13f70931855684f',
        'redirect' => 'http://localhost:8000/auth/callback/facebook',
    ],
    'twitter' => [
        'client_id' => 'R1FuaFVfbWJjT2RFb3Q4UkF5U086MTpjaQ',
        'client_secret' => 'BeohvCqMkAdFBu3tURd_x5h3Trua_Yed-SBTpxpFxZPhAE7gik',
        'redirect' => 'http://localhost:8000/auth/callback/twitter',
    ],

];
