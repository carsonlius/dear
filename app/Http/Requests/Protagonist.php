<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Protagonist extends FormRequest
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
            'name' => 'required|min:1',
            'name_en' => 'required|min:2',
            'intro' => 'required|min:20',
            'location' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请填写女神的名字',
            'name.min' => '请填写有效女神的名字',
            'name_en.required' => '请填写女神的英文名字',
            'name_en.min' => '请填写有效女神的英文名字',
            'intro.required' => '请填写描述',
            'intro.min' => '描述的长度太少了',
            'location.required' => '请选择女神的照片',
            'location.image' => '请上传正确的文件类型',
        ];
    }
}
