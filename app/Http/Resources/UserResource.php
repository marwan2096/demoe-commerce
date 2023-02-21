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
            'id' => (string)$this->id,
            'attributes' => [
        
                 'first_name'=>$this->first_name,
                 'last_name'=>$this->last_name,
                 'email'=>$this->email,
                 'password'=>$this->password,
                 'phone'=>$this->phone,
                 'gender'=>$this->gender,
                 'image'=>$this->image,
                 'birth-date'=>$this->birthdate,
                 'role'=>$this->role,
                 'email_verified_at'=>$this->email_verified_at,
                 'phone_verified_at'=>$this->phone_verified_at,


            ],
           
        ];
    }
}
