<?php

namespace App\Services\ContactVerification;

use App\Services\ContactVerification\Statuses;
use Exception;

class SmsLoginGetUserException extends Exception
{
    public function __construct($statusCode){
        $message = Statuses::getStatusMessage($statusCode);
        parent::__construct($message,$statusCode);
    }
}
