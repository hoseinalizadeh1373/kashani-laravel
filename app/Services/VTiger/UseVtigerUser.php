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
            if(!$contact) return false;
            $this->crm_contact_id = $contact->id;
            $this->crm_contact_number = $contact->contact_no;
            $this->contact_type = $contact->type;
            $this->save();
        }
        return true;
    }

    public function getIsRegisteredInCrmAttribute(){
        return $this->checkCrmContactId();
    }

}
