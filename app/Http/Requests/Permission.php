<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Permission extends FormRequest
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
        $rules = [];

        if (request('description')) {
            $rules['description'] = 'min:2';
        }

        if (request('model')) {
            $rules['model'] = 'min:2';
        }

        $route = request()->route()->uri();

        if ($route == 'Permission/store') {
            return array_merge( [
                'name' => 'required|min:2|unique:permissions,name',
                'slug' => 'required|min:2|unique:permissions,slug',
            ], $rules);
        }

        $id = request('id');

        return array_merge( [
            'id' => 'required',
            'name' => 'required|min:2|unique:permissions,name,' . $id,
            'slug' => 'required|min:2|unique:permissions,slug,' . $id,
        ], $rules);

    }

    public function messages()
    {
        return [
            'id.required' => 'id需要传递',
            'name.required' => '请输入权限的名称',
            'name.min' => '权限名称至少2位',
            'name.unique' => '权限名称是唯一的',
            'slug.required' => '请输入slug',
            'slug.min' => 'slug至少2位',
            'slug.unique' => 'slug是唯一的',
            'description.min' => '描述至少2位',
            'model.min' => 'Model 至少2位'
        ];
    }
}
