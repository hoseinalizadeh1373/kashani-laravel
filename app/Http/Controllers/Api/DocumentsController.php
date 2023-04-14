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

    public function getDoc(User $user, $docId)
    {
        $crm = new CrmMethods();
        return $crm->getFile($docId);
    }

    public function upload(User $user, Request $request)
    {
    
        $file = $request->file('file');
        $docTitle  = $request->doc_title;
        $filename = $docTitle . "." . $file->extension();
        
        $fileBase64 = base64_encode(file_get_contents($file->path()));

        $user->crm->uploadDocument($fileBase64, $filename, $docTitle);
        
        return response()->json(['success'=>'you']);
        // return redirect('/client/form');
    }
}
