@extends('layouts.nav_without_right_side')
@section('content')
    <div class="box-header with-border form-group">
        <span class="box-title content-header">编辑用户角色</span>
        <a href="{{ URL::to('RoleUser/index') }}"><span class="btn btn-sm btn-success" style="float: right">用户列表</span></a>
    </div>
    <div class="form-group">
    </div>
    {!! Form::open(array('url' => 'RoleUser/update', 'method'=>'post')) !!}
    <div class="form-group">

            {!! Form::hidden('user_id', $user_show['id']) !!}
        <div class="form-group">
            {!! Form::label('name', '用户名称') !!}
            {!! Form::text('name', $user_show['name'], ['class' => 'form-control']) !!}
        </div>

        <div>
            {!! Form::label('role_id', '角色') !!}
            @foreach($role_list as $role)
                {!! Form::radio('role_id', $role['id'], ($role['id'] == $role_user['role_id'])) !!} {{ $role['name'] }}
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