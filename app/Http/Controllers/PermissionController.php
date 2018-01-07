<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ultraware\Roles\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_show = Permission::all();
        return view('permission.index')->with(compact('list_show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Permission $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Permission $request)
    {
        Permission::create($request->except('_token'));
        return redirect('Permission/index');
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
     *
     * @param Permission $permissions
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permissions)
    {
        return view('permission.edit')->with(compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Permission $request
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Permission $request)
    {
        Permission::where('id', request('id'))->update($request->except('_token'));
        return redirect('Permission/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect('Permission/index');
    }
}
