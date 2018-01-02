@extends('layouts.app');
@section('content')
    <div class="box-header with-border form-group">
        <span class="box-title content-header">列表</span>
        <a href="{{ URL::to('Protagonist/index') }}"><span class="btn btn-sm btn-success" style="float: right">列表</span></a>
    </div>
    {!! Form::model($protagonist, array('url' => 'Protagonist/update', 'method'=>'post', 'files'=> true)) !!}
    <div class="form-group">
        {!! Form::label('name', "女神的名字"); !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        {!! Form::label('name_en', '女神的英文名字'); !!}
        {!! Form::text('name_en', null, ['class' => 'form-control']) !!}

        {!! Form::label('intro', '简介'); !!}
        {!! Form::textarea('intro', null, ['class' => 'form-control']) !!}

        <div class="form-group">
            {!! Form::label('location', '展示图') !!}
            <br>
            {!! Form::image($protagonist->location, null, ['width'=> '200', 'height' => '100']) !!}
        </div>

        {!! Form::file('location', ['class' => 'form-control', 'src' => $protagonist->location]) !!}

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