<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyContactMobile extends Notification 
{
    use Queueable;

    private $verificationCode;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SmsChannel::class,'database'];
    }

    
    public function toSms($notifiable)
    {
        $value =array("کد ورود شما :",$this->verificationCode,"مرکز خدمات پرستاری ثمین");
        return implode(',',$value);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            "man"=>"to"
        ];
    }
}
