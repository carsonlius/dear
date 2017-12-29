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
        $route_name = \Request::route()->getName();
        if ($route_name == 'store') {
            return [
                'name' => 'required|unique:photo_types,name',
                'label' => 'required|unique:photo_types,label',
                'status' => 'required|in:0,1'
            ];
        }
        $id = request('id');

        return [
            'id' => 'required|integer',
            'name' => 'required|unique:photo_types,' . $id . ',name',
            'label' => 'required|unique:photo_types,' . $id . ',label',
            'status' => 'required|in:0,1'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => '请填充类型名称',
            'name.unique' => '类型名称不唯一',
            'label.required' => '请填充描述',
            'label.unique' => '描述不唯一',
            'status.required' => '状态是必须的',
            'status.in' => '状态的范围不是合法的'
        ];
    }
}
