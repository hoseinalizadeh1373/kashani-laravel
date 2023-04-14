<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use PDO;

class ContactController extends Controller
{
    public function getInformation(User $user)
    {
        $contact = $user->crm->getContact();
        return $contact ? $contact->getRaw() : null;
    }

    public function storeInformation(User $user, Request $request)
    {
        
        $data = $request->contact_data;

        $contactType = [
            1=>"مراقب",
            2=>"پرستار",
            3=>"دکتر",
        ][$user->contact_type];
      

        $data["mobile"]= $user->mobile;
        $data["cf_pcf_irc_1122"]= $user->national_code;
        $data["id"]= $user->crm_contact_id;
        // $data["contact_no"]= $contactType;
        return $user->crm->update($data);
    }

    public function colabAs(User $user, Request $request)
    {

        $user->checkCrmContactId();

        if($user->isRegisteredInCrm) {
            abort(400);
        }

        $contactType = [
            1=>"مراقب",
            2=>"پرستار",
            3=>"دکتر",
        ][$request->colab_as];

        $contact = $user->crm->register(
            [
                "cf_pcf_irc_1122"=>$user->national_code,
                "name"=>$user->firstname,
                "lastname"=>$user->lastname,
                "mobile"=>$user->mobile,
                "cf_931"=>$contactType,
                "cf_927"=>"عدم نیاز"
            ]
        );
        
        $user->checkCrmContactId();

        return response()->json(["success"=>true]);

    }
}
