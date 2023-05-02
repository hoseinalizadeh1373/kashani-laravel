<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\VTiger\CrmMethods;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function relatedDocumentsList(User $user)
    {
        $relatedFolders = config("settings.documents.contact_related_folders");
        return $user->crm->getRelatedDocuments($relatedFolders);
    }

    public function uploadedDocumentsList(User $user)
    {
        $uploadFolderId = config("settings.documents.upload_folder");
        return $user->crm->getRelatedDocuments($uploadFolderId);
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

        $user->crm->uploadDocument($fileBase64, $filename, $docTitle, config("settings.documents.uploadid"));
        
        return response()->json(['success'=>'you']);
        // return redirect('/client/form');
    }
}
