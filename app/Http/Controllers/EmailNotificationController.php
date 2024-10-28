<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailNotification;
use App\Jobs\SendEmailNotification;
use Illuminate\Support\Facades\Validator;

class EmailNotificationController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $notification = EmailNotification::create([
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json(['message' => 'Email notification sent successfully.'], 201);
    }
}
