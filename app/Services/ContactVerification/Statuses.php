<?php 

namespace App\Services\ContactVerification;

use ReflectionClass;

class Statuses
{
    public const USER_NOT_REGISTERED = 101;
    public const MOBILE_NOT_BELONGS_TO_USER = 102;
    public const USER_EXISTS = 103;
    public const MOBILE_REGISTERED_FOR_ANOTHER_USER = 104;
    public const USER_REGISTERED_WITH_ANOTHER_MOBILE = 105;
    public const UNKNOWN_SERVER_ERROR = 500;

    private static $messages = [
        self::USER_NOT_REGISTERED => "کاربر ثبت نشده است",
        self::MOBILE_NOT_BELONGS_TO_USER => "شماره موبایل وارد شده متعلق به این کاربر نیست",
        self::USER_EXISTS => "یوزر وجود دارد",
        self::MOBILE_REGISTERED_FOR_ANOTHER_USER => "این شماره موبایل برای کاربر دیگری ثبت شده است",
        self::USER_REGISTERED_WITH_ANOTHER_MOBILE => "این کاربر با شماره موبایل دیگری ثبت شده است",
        self::UNKNOWN_SERVER_ERROR => "خطای نامشخص",
    ];

    public static function getStatusMessage($status)
    {
        return self::$messages[$status] ?? "وضعیت نامشخص";
        $class = new ReflectionClass(self::class);
        $constants = $class->getConstants();

        foreach ($constants as $name => $value) {
            if ($value == $status) {
                return $name;
            }
        }
    } 

}