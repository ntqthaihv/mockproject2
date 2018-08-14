<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddContentRequest extends AbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'class_id' => 'required',
            'title' => 'required|max:64',
            'content' => 'required',
            'level' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
    }

}
