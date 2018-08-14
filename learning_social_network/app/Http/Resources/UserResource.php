<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'id'        => $this->id,
            'email'     => $this->email,
            'full_name'  => $this->fullName,
            'family_name' => $this->familyName,
            'given_name'  => $this->givenName,
            'avatar'    => $this->avatar,
            //'token'  => $this->token,
            //'password' => $this->password,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
