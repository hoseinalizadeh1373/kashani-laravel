<?php

namespace App\Services\VTiger;

class CrmUser
{
    private $crmMethods;
    private $user;

    public function __construct($user)
    {
        $this->crmMethods = new CrmMethods();
        $this->user = $user;
    }

    public function __call($name, $arguments)
    {
        $this->user->checkCrmContactId();

        if(method_exists(CrmMethods::class, $name)) {
            return $this->crmMethods->$name(
                $this->user->crm_contact_id,
                ...$arguments
            );
        }
    }
}
