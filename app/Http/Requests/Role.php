<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Role extends FormRequest
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

        if ($route_name == 'role_update') {
            $id = request('id');
            return [
                'id' => 'required',
                'name' => 'required|min:2|unique:roles,name,' . $id,
                'slug' => 'required|min:2|unique:roles,slug,' . $id,
                'level' => 'required|in:1,2,3,4,5',
            ];


        }
        return [
            'name' => 'required|min:2|unique:roles,name',
            'slug' => 'required|min:2|unique:roles,slug',
            'level' => 'required|in:1,2,3,4,5',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请填充角色名称',
            'name.min' => '角色名称至少2位',
            'name.unique' => '角色名称已经被占用',
            'slug.unique' => 'slug已经被占用',
            'slug.required' => '请填充slug',
            'slug.min' => 'slug至少2位',
            'level.required' => '请填充角色的权重',
            'level.in' => '传递的角色权重超过最高值'
        ];
    }

}
