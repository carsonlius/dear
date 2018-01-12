@extends('layouts.nav_without_right_side');
@section('content')
    <div class="box-header with-border form-group">
        <span class="box-title content-header">列表</span>
        <a href="{{ URL::to('Protagonist/index') }}"><span class="btn btn-sm btn-success" style="float: right">列表</span></a>
    </div>
    {!! Form::open(array('url' => 'Protagonist/store', 'method'=>'post', 'files'=> true)) !!}
    <div class="form-group">

        {!! Form::label('name', "女神的名字"); !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        {!! Form::label('name_en', '女神的英文名字'); !!}
        {!! Form::text('name_en', null, ['class' => 'form-control']) !!}

        {!! Form::label('intro', '简介'); !!}
        {!! Form::textarea('intro', null, ['class' => 'form-control']) !!}

        {!! Form::label('location', '插图') !!}
        {!! Form::file('location', ['class' => 'form-control']) !!}

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