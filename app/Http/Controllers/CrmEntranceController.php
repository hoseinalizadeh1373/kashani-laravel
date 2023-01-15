<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Searchline\Searchline;
use App\VTiger\CrmMethods;
use Illuminate\Http\Request;

class CrmEntranceController extends Controller
{

    private $vtiger;

    public function __construct()
    {
        $this->vtiger = new CrmMethods();    
    }

    public function entrance($token){

        $contact = $this->getCrmContactWithToken($token);

        if(!$contact)
        {
            return "contact not exists on crm";
        }

        $user = User::whereNationalCode($contact->national_code)->first();

        if($user){
            $user->sendMobileVerificationCode();
            return view("auth.login", ["mode"=>"checkSms", "mobile"=>$user->mobile]);
        }

        if(!$contact->checkMobileBelongsTo())
            return 'mobile number not belongs to this persion';
     
        if(!$user)
            $user = $this->registerWithCrmContact($contact);
        
        $user->sendMobileVerificationCode();
        return view("auth.login", ["mode"=>"checkSms"]);

    }

    private function getCrmContactWithToken($token){
        return $this->vtiger->getContactByContactNumber($token);
    }
    
    private function registerWithCrmContact($contact){
        $user = new User;
        $user->national_code = $contact->national_code;
        $user->mobile = $contact->mobile;
        $user->firstname = $contact->firstname; 
        $user->lastname = $contact->lastname; 
        $user->email = $contact->email;
        $user->save(); 

        return $user;
    }
}
