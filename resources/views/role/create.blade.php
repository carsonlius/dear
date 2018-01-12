@extends('layouts.nav_without_right_side')
@section('content')
    <div class="box-header with-border form-group">
        <span class="box-title content-header">创建角色</span>
        <a href="{{ URL::to('Role/index') }}"><span class="btn btn-sm btn-success" style="float: right">角色列表</span></a>
    </div>
    <div class="form-group">
    </div>
    {!! Form::open(array('url' => 'Role/store', 'method'=>'post')) !!}
    <div class="form-group">
        {!! Form::label('name', '角色名称') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        <div class="form-group">
            {!! Form::label('slug', 'slug') !!}
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        </div>

        <div>
            {!! Form::label('description', '角色描述') !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('level', '节点级别') !!}
            {!! Form::select('level', [1=>1,2=>2,3=>3,4=>4,5=>5], null,['class' => 'form-control']) !!}
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