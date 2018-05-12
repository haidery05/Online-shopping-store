<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

/*    'twitter' => [
    'client_id' => env('Zebhqv9VcQiuSwTHRZjEwoYW4'),         // Your twitter Client ID
    'client_secret' => env('qbr975jJOFFzY9LWkuzbIuPCj0LUPtAMivsJpMf9sMQNp2foRU'), // Your twitter Client Secret
    'redirect' => 'localhost/login/twitter/callback',
],
*/
    'facebook' => [
    'client_id' => '182302109052028',         // Your facebook ID
    'client_secret' => 'd6cb3141d7b2366eb382a3b7ef62a798', // Your facebook Client Secret
    'redirect' => 'https://shopping.dev/login/facebook/callback',
],

    'twitter' => [
    'client_id' => 'Zebhqv9VcQiuSwTHRZjEwoYW4',         // Your twitter ID
    'client_secret' => 'qbr975jJOFFzY9LWkuzbIuPCj0LUPtAMivsJpMf9sMQNp2foRU', // Your twitter Client Secret
    'redirect' => 'https://shopping.dev/login/twitter/callback',
],

    'google' => [
    'client_id' => '114299753963-bfqvgqns11t66b9d5q12pa8hvvi9v2i7.apps.googleusercontent.com',         // Your google ID
    'client_secret' => 'FLbIYsMfXpVIMgFeOxijJsyN', // Your google Client Secret
    'redirect' => 'http://shopping.dev/login/google/callback',
],

    'linkedin' => [
    'client_id' => '182302109052028',         // Your linkedin ID
    'client_secret' => 'd6cb3141d7b2366eb382a3b7ef62a798', // Your linkedin Client Secret
    'redirect' => 'http://shopping.dev/login/linkedin/callback',
],

    'github' => [
    'client_id' => '182302109052028',         // Your github ID
    'client_secret' => 'd6cb3141d7b2366eb382a3b7ef62a798', // Your github Client Secret
    'redirect' => 'http://shopping.dev/login/github/callback',
],

];
