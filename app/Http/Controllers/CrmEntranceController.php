<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CrmEntranceController extends Controller
{
    public function entrance($token){
        
        $contact = $this->getCrmContactWithToken($token);
        
        $user = User::registerContact($contact);

        $user->login();

        return redirect()->to(route("client.home"));

    }
}
