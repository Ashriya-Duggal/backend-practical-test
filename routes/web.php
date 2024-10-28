<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailNotificationController;
use Illuminate\Support\Facades\Mail;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/send-email', [EmailNotificationController::class, 'sendEmail']);

Route::get('/test-email', function () {
    Mail::raw('This is a test email.', function ($message) {
        $message->to('ashriyaduggal@gmail.com')
                ->subject('Test Email');
    });

    return 'Email sent!';
});
