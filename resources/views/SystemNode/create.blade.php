@extends('layouts.nav_without_right_side')
@section('content')
    <div class="box-header with-border form-group">
        <span class="box-title content-header">创建菜单</span>
        <a href="{{ URL::to('SystemNode/index') }}"><span class="btn btn-sm btn-success" style="float: right">菜单列表</span></a>
    </div>
    <div class="form-group">
    </div>
    {!! Form::open(array('url' => 'SystemNode/store', 'method'=>'post')) !!}
    <div class="form-group">
        {!! Form::label('pid', '父菜单') !!}
        {!! Form::select('pid', $node_first, 0, ['class' => 'form-control']) !!}

        <div class="form-group">
            {!! Form::label('name', '菜单名称'); !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div>
            {!! Form::label('label', '菜单描述'); !!}
            {!! Form::text('label', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('node', '菜单控制'); !!}
            {!! Form::text('node', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('listorder', '同级菜单排序') !!}
            {!! Form::text('listorder', 0 , ['class' => 'form-control', 'placeholder' => '值越大 则排序越靠前']) !!}
        </div>

        <div class="form-inline">
            {!! Form::label('is_show', '是否显示'); !!}
             {!! Form::radio('is_show', 0, false, ['class' => '']) !!}否
             {!! Form::radio('is_show', 1, true, ['class' => '']) !!}是
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