@extends('layouts.nav_without_right_side');
@section('content')
    <div class="box-header with-border form-group">
        <span class="box-title content-header">创建照片类型</span>
        <a href="{{ URL::to('PhotoType/index') }}"><span class="btn btn-sm btn-success" style="float: right">照片类型列表</span></a>
    </div>

    {!! Form::model($photoType, array('url' => 'PhotoType/update', 'method'=>'post')) !!}
    <div class="form-group">
        {!! Form::hidden('id', $photoType->id) !!}
        {!! Form::label('name', '照片类型名称'); !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        {!! Form::label('status', '状态'); !!}
        {!! Form::select('status', ['禁用', '可用'], null, ['class' => 'form-control']) !!}

        {!! Form::label('label', '类型描述'); !!}
        {!! Form::text('label', null, ['class' => 'form-control']) !!}

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