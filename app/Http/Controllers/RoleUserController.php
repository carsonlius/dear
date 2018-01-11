<?php

namespace App\Http\Controllers;

use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Ultraware\Roles\Models\Role;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_show = User::all()->toArray();
        $roles = array_column(Role::all()->toArray(), null, 'id');
        $user_roles_relation = RoleUser::all()->toArray();
        $user_roles_relation = array_column($user_roles_relation, null, 'user_id');

        foreach ($list_show as &$user) {
            if (!isset($user_roles_relation[$user['id']])) {
                $user['role_name'] = '等待配置角色';
                continue;
            }
            $role_id = $user_roles_relation[$user['id']]['role_id'];
            $user['role_name'] = $roles[$role_id]['name'];
        }

        return view('RoleUser.index')->with(compact('list_show'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @return void
     */
    public function edit()
    {
        $role_list = array_column(Role::all()->toArray(), null, 'id');
        $user_list = array_column(User::all()->toArray(), null, 'id');
        $user_show = $user_list[request('id')];

        $role_user = RoleUser::where('user_id', request('id'))->first();
        $role_user = $role_user ? $role_user->toArray() : ['role_id' => 'none'];

        return view('RoleUser.edit')->with(compact('user_show', 'role_list', 'role_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\RoleUser $request
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\RoleUser $request)
    {
        //　create when not exists
        $user_id = request('user_id');
        RoleUser::updateOrCreate(['user_id' => $user_id], $request->except(['_token', 'name']));
        return redirect('RoleUser/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
