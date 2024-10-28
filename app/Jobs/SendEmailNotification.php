<?php
namespace App\Jobs;

use App\Mail\EmailNotificationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendEmailNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subject;
    protected $message;

    public function __construct($subject, $message)
    {
        Log::info('__construct', ['subject' => $this->subject, 'message' => $this->message]);
        $this->subject = $subject;
        $this->message = $message;
    }

    public function handle()
    {
        Log::info('Sending email notification', ['subject' => $this->subject, 'message' => $this->message]);
        try {
            Mail::to('ashriyaduggal@gmail.com')
                ->send(new EmailNotificationMail($this->subject, $this->message));
        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
        }
        
    }
}
