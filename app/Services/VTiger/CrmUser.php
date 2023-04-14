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


    public function register($data)
    {
        return $this->crmMethods->createNewContact($data);
    }

    public function update($data)
    {
        return $this->crmMethods->updateContact($data);
    }


    public function uploadDocument($fileBase64, $filename, $title)
    {
        $docid = $this->crmMethods->createDocument(
            $this->user->crm_contact_id,
            $fileBase64,
            $filename,
            $title
        );

        $this->crmMethods->addRelatedDoc($this->user->crm_contact_id, $docid);

        return true;
    }


    public function __call($name, $arguments)
    {
        $this->user->checkCrmContactId();

        if(method_exists(CrmMethods::class, $name)) {
            return $this->crmMethods->$name(
                $this->user->crm_contact_id,
                ...$arguments
            );
        } else {
            throw new \Exception("Crm Method Not Found.");
        }
    }
}
