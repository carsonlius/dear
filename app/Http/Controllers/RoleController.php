<?php

namespace App\Http\Controllers;

use Ultraware\Roles\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_show =  Role::all();
       return view('role.index')->with(compact('list_show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Role $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Role $request)
    {
        Role::create($request->toArray());
        return redirect('Role/index');
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
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('role.edit')->with(compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Role $request
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Role $request)
    {
        Role::where('id', $request->id)->update($request->except('_token'));
        return redirect('Role/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('Role/index');
    }
}
