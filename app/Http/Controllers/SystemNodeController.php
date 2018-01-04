<?php

namespace App\Http\Controllers;

use App\SystemNode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SystemNodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_show = (new SystemNode())->orderBy('id')->get()->toArray();
//        $list_show = array_column($list_show, 'name');
        return view('SystemNode.index')->with(compact('list_show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $node_first = SystemNode::where(['pid' => 0])->get()->toArray();
        $node_first[] = ['id' => 0, 'name' => '一级目录'];
        $node_first = array_column($node_first, 'name', 'id');
        ksort($node_first);
        return view('SystemNode.create')->with(compact('node_first'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\SystemNode $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(\App\Http\Requests\SystemNode $request)
    {

        SystemNode::create($request->toArray());
        return redirect('SystemNode/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SystemNode $systemNode
     * @return \Illuminate\Http\Response
     */
    public function show(SystemNode $systemNode)
    {
        return view('SystemNode.show')->with(compact('systemNode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SystemNode $systemNode
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemNode $systemNode)
    {
        $node_first = SystemNode::where(['pid' => 0])->get()->toArray();
        $node_first[] = ['id' => 0, 'name' => '一级目录'];
        $node_first = array_column($node_first, 'name', 'id');
        ksort($node_first);
        return view('SystemNode.edit')->with(compact('systemNode', 'node_first'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\SystemNode $systemNode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SystemNode $systemNode)
    {
        $id = $request->id;
        $rule = [
            'name' => 'required|unique:system_nodes,name,' . $id . '|min:2',
            'label' => 'required|unique:system_nodes,label,' . $id . '|min:2',
            'node' => 'required|min:2',
            'pid' => 'required|integer',
            'listorder' => 'required|integer',
            'is_show' => 'required|in:0,1',
        ];

        $message = [
            'id.required' => '缺少ID',
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
        $this->validate($request, $rule, $message);

        $systemNode->where('id', $id)->update($request->except('_token'));
        return redirect('SystemNode/index');
    }

    /**
     * Remove the specified resource from storage.
     * @param SystemNode $systemNode
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(SystemNode $systemNode)
    {
        $systemNode->delete();
        return redirect('SystemNode/index');
    }
}
