<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWeatherEmailJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $subject;
    protected $message;

    public function __construct($email, $subject, $message)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function handle(Mailer $mailer)
    {
        $mailer->raw($this->message, function ($mail) {
            $mail->to($this->email)
                ->subject($this->subject);
        });
    }
}
