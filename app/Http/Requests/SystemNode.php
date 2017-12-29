<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemNode extends FormRequest
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
            'name' => 'required|unique:system_nodes,name|min:2',
            'label' => 'required|unique:system_nodes,label|min:2',
            'node' => 'required|min:2',
            'pid' => 'required|integer',
            'listorder' => 'required|integer',
            'is_show' => 'required|in:0,1',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => '请填写节点名称',
            'name.unique' => '节点名称是唯一的',
            'name.min' => '节点名称的长度至少是2位',
            'label.required' => '请填写节点描述',
            'label.unique' => '节点描述是唯一的',
            'label.min' => '节点描述至少是2位',
            'node.required' => '请填写节点路径',
            'node.min' => '节点路径至少是2位',
            'pid.required' => '请选择父节点',
            'pid.integer' => '父节点必须是数字',
            'listorder.required' => '请选择排序优先级',
            'listorder.integer' => '排序优先级必须是数字',
            'is_show.required' => '请选择是不是要展示',
            'is_show.in' => '是否显示传递的数据出错',
        ];
    }
}
