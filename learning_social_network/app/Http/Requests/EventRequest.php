<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends AbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'documents' => 'required',
            'start' => 'required',
            'end' => 'required',
            'duration' => 'required',
            'speaker' => 'required',
        ];
    }
}
