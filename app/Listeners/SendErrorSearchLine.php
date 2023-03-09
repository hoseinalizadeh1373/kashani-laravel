<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Sms\UseMeliPayamak;
use Illuminate\Support\Facades\Log;

class SendErrorSearchLine
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;


        
        $payamak = new UseMeliPayamak();
        $error ="کاربر با کد کاربری".$user->crm_contact_number."برای ورود به سامانه از طریق سرچ لاین به مشکل خورد";

        $payamak->send($error,"09332999173");
        
    }
}
