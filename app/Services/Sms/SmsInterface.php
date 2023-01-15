<?php

namespace App\Services\Sms;

interface SmsInterface
{
    public function credit();
    public function send($message,$to);

    /**
     * send sms with pattern
     *
     * @param string|int $patternId
     * @param string $to
     * @param array $arrgs
     * @return void
     */
    public function sendPattern($patternId,$to,$arrgs);

}