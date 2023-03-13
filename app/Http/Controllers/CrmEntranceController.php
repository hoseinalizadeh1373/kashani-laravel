<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Searchline\Searchline;
use App\VTiger\CrmContact;
use App\VTiger\CrmMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CrmEntranceController extends Controller
{
    private $vtiger;

    public function __construct()
    {
        $this->vtiger = new CrmMethods();
    }

    public function welcome($token)
    {
        return view("crmEntrance.welcome", compact("token"));
    }

    public function checkContact()
    {

        $token = request()->get("token");
        try {
            $contact = $this->getCrmContactWithToken($token);
        } catch(\Exception $err) {
            //dd($err->getMessage());
           
            return response()->json([
                "success"=>false,
                "code"=>"120",
                "message"=>trans('vtiger.'."Could not connect to Crm")
            ]);
           
        }


        if (!$contact) {
            // return "contact not exists on crm";
            return response()->json([
                "success"=>false,
                "code"=>"121",
                "message"=>trans('vtiger.'."Crm Contact Not Found")
            ]);

        }

        $user = User::whereNationalCode($contact->national_code)->first();

        if (!$user) {
            $user = $this->registerWithCrmContact($contact);
        }

        if ($user->mobile != $contact->mobile) {
            $user->resetMobileVerifyStatus();
        }


        // اگر وضعیت تعلق موبایل در سی آر ام مشخص شده بود .. نامشخ نبود .. جدول خودمان را آپدیت میکنیم و میگذریم
        // if($contact->cf_1934!="" or $contact->cf_1934!="نامشخص"){
        //     $user->updateVerifyStatusFromCrm($contact->cf_1934);
        // }

        if ($contact->cf_1934 == config('Fields.'.User::MOBILE_BELONG_MANUAL)) {
            $user->updateVerifyStatusFromCrm($contact->cf_1934);
        }

        // اگر وضعیت سی آر ام مشخص بود از این مرحله عبور میکنیم
        if (!$user->checkMobileBelongsTo()) {
            //return 'mobile number not belongs to this person';
            return response()->json([
                "success"=>false,
                "code"=>"122",
                "message"=>trans('vtiger.'."Mobile number not belongs to contact")
            ]);
        }

        $user->sendMobileVerificationCode();
        
           
        return response()->json([
            "success"=>true,
            "message"=>"Sms Sent To Contact",
            "data"=>[
                "mobile"=>$user->mobile
            ]
        ]);

    }

    public function entrance($token)
    {
        try {
            $contact = $this->getCrmContactWithToken($token);
        } catch(\Exception $err) {
            //dd($err->getMessage());
            $url = url('/crme/'.$token);
            return view('errors.errorCatch', ['url'=>$url]);
        }

        if (!$contact) {
            // return "contact not exists on crm";
            $url = url('/crme/'.$token);
            $params = config('MessageAlert.not_exist');
            return view('errors.errorCatch', ['url'=>$url,'params'=>$params]);
        }

        $user = User::whereNationalCode($contact->national_code)->first();

        if (!$user) {
            $user = $this->registerWithCrmContact($contact);
        }

        if ($user->mobile != $contact->mobile) {
            $user->resetMobileVerifyStatus();
        }

        // اگر وضعیت تعلق موبایل در سی آر ام مشخص شده بود .. نامشخ نبود .. جدول خودمان را آپدیت میکنیم و میگذریم
        // if($contact->cf_1934!="" or $contact->cf_1934!="نامشخص"){
        //     $user->updateVerifyStatusFromCrm($contact->cf_1934);
        // }

        if ($contact->cf_1934 == config('Fields.'.User::MOBILE_BELONG_MANUAL)) {
            $user->updateVerifyStatusFromCrm($contact->cf_1934);
        }

        // اگر وضعیت سی آر ام مشخص بود از این مرحله عبور میکنیم
        if (!$user->checkMobileBelongsTo()) {
            //return 'mobile number not belongs to this person';
            $url = url('/crme/'.$token);
            $params = config('MessageAlert.belong_mobile');
            return view('errors.errorCatch', ['url'=>$url,'params'=>$params]);
        }

        $user->sendMobileVerificationCode();
        return view("auth.login", ["mode"=>"checkSms", "mobile"=>$user->mobile]);
    }


    private function getCrmContactWithToken($token)
    {
        return $this->vtiger->getContactByContactNumber($token);
    }

    private function registerWithCrmContact($contact)
    {
        $contactType = [
            "مراقب"=>User::CONTACT_TYPE_MORAGHEB,
            "پرستار"=>User::CONTACT_TYPE_NURSE,
            "دکتر"=>User::CONTACT_TYPE_DOCTOR,
        ][$contact->type] ?? User::CONTACT_TYPE_MORAGHEB;


        $user = new User();
        $user->national_code = $contact->national_code;
        $user->mobile = $contact->mobile;
        $user->firstname = $contact->firstname;
        $user->lastname = $contact->lastname;
        $user->email = $contact->email;
        $user->contact_type = $contactType;
        $user->mobile_verify_status = User::MOBILE_BELONG_NOT_CHECK;
        $user->crm_contact_id = $contact->id;
        $user->crm_contact_number = $contact->contact_no;
        $user->save();

        return $user;
    }
}
