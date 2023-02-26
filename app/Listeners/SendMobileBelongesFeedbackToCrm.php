<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\VTiger\CrmMethods;

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
        $data = [
            "id"=> $event->user->crm_contact_id,
            "check_manually" => $searchlineStatus
        ];

        $crm = new CrmMethods();
        $crm->updateContactInformation($data);

        Log::alert("listener",[
            "user"=>$user,
            "sta"=>$searchlineStatus,
        ]);

    }
}
