<?php
 
namespace App\Notifications;

use App\Services\Sms\SmsInterface;
use Illuminate\Notifications\Notification;
 
class SmsChannel
{
    private $sms;
    public function __construct(SmsInterface $sms)
    {
        $this->sms = $sms;        
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable);
        $this->sms->send($message,$notifiable->mobile);
    }
}