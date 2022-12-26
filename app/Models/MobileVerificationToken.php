<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileVerificationToken extends Model
{
    use HasFactory;
    protected $fillable = ["token","mobile"];

    public static function createToken($mobile){
        return self::create([
            "mobile"=>$mobile,
            "token"=>random_int(10000,99999)
        ]);
    }

    public static function getLastTokenOf($mobile){
        return self::whereMobile($mobile)->latest()->first();
    }
}
