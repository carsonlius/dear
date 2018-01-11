@extends('layouts.app')
@section('content')
    <div class="box-header with-border form-group">
        <span class="box-title content-header">编辑角色权限</span>
        <a href="{{ URL::to('PermissionRole/index') }}"><span class="btn btn-sm btn-success" style="float: right">角色权限列表</span></a>
    </div>
    <div class="form-group">
    </div>
    {!! Form::open(array('url' => 'PermissionRole/update', 'method'=>'post')) !!}
    <div class="form-group">
        {!! Form::hidden('role_id', $role_show['id']) !!}


        {!! Form::label('role_name', '角色名称') !!}: {!! $role_show['name'] !!}

        <div class="form-group">
            {!! Form::label('permission_list', '权限') !!}
            @foreach($list_permissions as $permission)
                {!! Form::checkbox('permission_list[]', $permission['id'], (in_array($permission['id'], $list_role_permissions))) !!} {!! $permission['name'] !!}
            @endforeach
        </div>


        {!! Form::submit('上传', ['class' => 'btn btn-success form-control']) !!}
        {{ Form::close() }}
    </div>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection