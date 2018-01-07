@extends('layouts.app')
@section('content')
    <div class="box-header with-border form-group">
        <span class="box-title content-header">编辑权限</span>
        <a href="{{ URL::to('Permission/index') }}"><span class="btn btn-sm btn-success" style="float: right">权限列表</span></a>
    </div>
    <div class="form-group">
    </div>
    {!! Form::model($permissions, array('url' => 'Permission/update', 'method'=>'post')) !!}
    <div class="form-group">
        {!! Form::label('name', '权限名称') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! Form::hidden('id', $permissions->id) !!}

        <div class="form-group">
            {!! Form::label('slug', 'slug') !!}
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        </div>

        <div>
            {!! Form::label('description', '权限描述') !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('model', 'Model') !!}
            {!! Form::text('model', null, ['class' => 'form-control']) !!}
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