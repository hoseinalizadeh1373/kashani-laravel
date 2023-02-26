<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendMobileBelongesFeedbackToCrm
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
        $searchlineStatus = $event->searchlineStatus;


        // crm method -> update
        // field codemelli va mobile verification

        Log::alert("listener",[
            "user"=>$user,
            "sta"=>$searchlineStatus,
        ]);

    }
}
