<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailNotificationController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/email-notification', function () {
//     return view('email_notification');
// });

Route::post('/send-email', [EmailNotificationController::class, 'sendEmail']);