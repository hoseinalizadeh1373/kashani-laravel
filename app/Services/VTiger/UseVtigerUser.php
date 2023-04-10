<?php

namespace App\Services\VTiger;

trait UseVtigerUser
{
    private $crmUser;

    public function getCrmAttribute()
    {
        if(!$this->crmUser instanceof CrmUser) {
            $this->crmUser = new CrmUser($this);
        }

        return $this->crmUser;
    }

    public function checkCrmContactId()
    {
        if(!$this->crm_contact_id) {
            $crmMethods = new CrmMethods();
            $contact = $crmMethods->getContactByNationalCode($this->national_code);
            $this->crm_contact_id = $contact->id;
            $this->crm_contact_number = $contact->contact_no;
            $this->save();
        }
    }
}
