<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "firstname"=>$this->firstname,
            "lastname"=>$this->lastname,
            "mobile"=>$this->mobile,
            "national_code"=>$this->national_code,
            "crm_registered"=>$this->is_registered_in_crm,
            "contact_type"=>$this->contact_type,
        ];
    }
}
