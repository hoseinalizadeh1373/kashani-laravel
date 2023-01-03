<?php

namespace App\Exceptions;

use Exception;

class SmsLoginGetUserException extends Exception
{
    const USER_NOT_REGISTERED = 101;
    const MOBILE_NOT_BELONGS_TO_USER = 102;
    const USER_EXISTS = 103;
    const MOBILE_REGISTERED_FOR_ANOTHER_USER = 104;
    const USER_REGISTERED_WITH_ANOTHER_MOBILE = 105;
    const UNKNOWN_SERVER_ERROR = 500;

    public function __construct($statusCode){
        $message = [
            101 => "USER_NOT_REGISTERED",
            102 => "MOBILE_NOT_BELONGS_TO_USER",
            103 => "USER_EXISTS",
            104 => "MOBILE_REGISTERED_FOR_ANOTHER_USER",
            105 => "USER_REGISTERED_WITH_ANOTHER_MOBILE",
        ][$statusCode] ?? "UNKNOWN_SERVER_ERROR";

        parent::__construct($message,$statusCode);
    }

}
