<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUser extends FormRequest
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
            'user_id' => 'required|integer',
            'role_id' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => '请填充user_id',
            'user_id.integer' => 'user_id 需要填充成integer',
            'role_id.required' => '请填充role_id',
            'role_id.integer' => 'role_id 需要填充成integer',
        ];
    }
}
