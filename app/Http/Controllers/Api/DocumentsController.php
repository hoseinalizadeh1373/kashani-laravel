<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\VTiger\CrmMethods;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function list(User $user)
    {
        return $user->crm->GetDocuments();
      /*   $crm = new CrmMethods();
        $contact = $crm->getContactByNationalCode($user->national_code);
        $docs = $crm->getDocuments($contact->id);
        return $docs; */
    }

    public function getDoc(User $user, $docId){
        $crm = new CrmMethods();
        return $crm->getFile($docId);
    }
}
