<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoType extends FormRequest
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
            'name' => 'required|unique:photo_types,name',
            'label' => 'required|unique:photo_types,label'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请填充类型名称',
            'name.unique' => '类型名称不唯一',
            'label.required' => '请填充描述',
            'label.unique' => '描述不唯一',
        ];
    }
}
