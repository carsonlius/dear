<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelRecord extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|unique:travel_records|min:3',
            'content' => 'required|string|min:10',
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.min' => '标题最少需要3 words',
            'title.unique' => '标题是唯一的',
            'content.min' => '描述至少需要10 words'
        ];
    }
}
