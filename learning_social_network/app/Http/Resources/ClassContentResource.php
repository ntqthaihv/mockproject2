<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class ClassContentResource extends JsonResource
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
        return [
            'id' => $this->id,
            'class_id' => $this->class_id,
            'title' => $this->title,
            'thumbnail' => $this->thumbnail,
            'content' => $this->content,
            'level' => $this->level,
            'duration' => $this->duration,
            'documents' => $this->documents,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'author' => $this->author,
            //$this->author, UserResource::collection($this->whenLoaded('User'))
            'is_done' => $this->is_done,
            'is_approve' => $this->is_approve,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
