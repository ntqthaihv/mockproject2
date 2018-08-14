<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NtqClassResource extends JsonResource
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
            'name' => $this->classId,
            'slug' => $this->title,
            'description' => $this->thumbnail,
            'thumbnail' => $this->content,
            'creator' => $this->level,
            'start_date' => $this->duration,
            'end_date' => $this->documents,
            'created_at' => $this->start_date,
            'updated_at' => $this->end_date,
        ];
    }
}
