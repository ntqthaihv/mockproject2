<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassMemberResource extends JsonResource
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
            'id' => $this->id,
            'class_id' => $this->class_id,
            'user_id' => $this->user_id,
            'is_captain' => $this->is_captain,
            'is_mentor' => $this->is_mentor,
            'statust' => $this->statust,
            'created_at' => $this->start_date,
            'updated_at' => $this->end_date,
        ];
    }
}
