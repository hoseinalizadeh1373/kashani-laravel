<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Events\SearchLineChecked;
use App\Events\ErrorSearchLine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use \App\Services\ContactVerification\VerifyContactMobile;
use App\Services\Searchline\Searchline;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, VerifyContactMobile;

    const CONTACT_TYPE_MORAGHEB = 1;
    const CONTACT_TYPE_NURSE = 2;
    const CONTACT_TYPE_DOCTOR = 3;

    const MOBILE_BELONG_YES = 1;
    const MOBILE_BELONG_NO = 0;
    const MOBILE_BELONG_NOT_CHECK = -1;
    const MOBILE_BELONG_MANUAL = -2;
    const MOBILE_BELONG_HAS_ERROR =-3;

    // const MOBILE_BELONG_YES = "معتبر";
    // const MOBILE_BELONG_NO = "نامعتبر";
    // const MOBILE_BELONG_NOT_CHECK = "نامشخص";
    // const MOBILE_BELONG_MANUAL = "دستی";
    // const MOBILE_BELONG_HAS_ERROR ="خطا";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'national_code',
        'mobile',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getNameAttribute(){
        return $this->firstname . " " . $this->lastname;
    }


    public function resetMobileVerifyStatus(){
        $this->mobile_verify_status = self::MOBILE_BELONG_NOT_CHECK;
        $this->save();
    }

    public function updateVerifyStatusFromCrm($cf_1934)
    {
        $this->mobile_verify_status = $cf_1934;
        $this->save();
    }

    public function checkMobileBelongsTo(){

        if($this->mobile_verify_status != self::MOBILE_BELONG_NOT_CHECK){

            //if not blongs
            if($this->mobile_verify_status===self::MOBILE_BELONG_NO or $this->mobile_verify_status ===self::MOBILE_BELONG_HAS_ERROR)
                return false;

            // if belongs or manual
            return true;
        }
        
        $searchline = new Searchline;
        $isBelong = $searchline->isMobileBelongsToPerson($this->mobile,$this->national_code);

        $status=null;
        switch (true){
            case ($isBelong===true):
                $status = self::MOBILE_BELONG_YES;
                break;
            
            case ($isBelong===false):
                $status = self::MOBILE_BELONG_NO;
                break;

            
            case ($isBelong===null):
                $status = self::MOBILE_BELONG_HAS_ERROR;
                ErrorSearchLine::dispatch($this);
                break;
        }

        $this->mobile_verify_status = $status;
        $this->save();

        SearchLineChecked::dispatch($this,$status);
        
        return $isBelong;

    }

}
