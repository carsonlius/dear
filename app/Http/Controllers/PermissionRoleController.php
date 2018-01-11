<?php

namespace App\Http\Controllers;

use App\PermissionRole;
use Illuminate\Http\Request;
use Ultraware\Roles\Models\Permission;
use Ultraware\Roles\Models\Role;

class PermissionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_permissions = Permission::all();
        $list_role = Role::all();
        $list_role_permissions = PermissionRole::all()->toArray();
        $list_permissions_choose = [];
        array_map(function ($item) use (&$list_permissions_choose) {
            $list_permissions_choose[$item['role_id']][] = $item['permission_id'];

        }, $list_role_permissions);


        return view('PermissionRole.index')->with(compact('list_permissions_choose', 'list_role', 'list_permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role_show = Role::find($id)->toArray();
        $list_permissions = Permission::all()->toArray();
        $list_role_permissions = PermissionRole::where('role_id', $id)->get();


        if ($list_role_permissions) {
            $list_role_permissions = array_column($list_role_permissions->toArray(), 'permission_id');
        } else {
            $list_role_permissions = [];
        }

        return view('PermissionRole.edit')->with(compact('role_show', 'list_permissions', 'list_role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'role_id' => 'required|integer',
            'permission_list' => 'required|array'
        ];
        $messages = [
            'role_id.required' => '缺少rol_id参数',
            'role_id.integer' => '角色id必须是整数',
            'permission_list.required' => '缺少permission_list参数',
            'permission_list.array' => 'permission_list必须用数组的形式传递'
        ];

        $this->validate($request, $rules, $messages);
        $role_collection = Role::find(request('role_id'));

        $role_collection->syncPermissions(request('permission_list'));
        return redirect('PermissionRole/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
