@extends('layouts.app');
@section('content')
    <div class="form-group">
    </div>
    {!! Form::open(array('url' => 'PhotoType/store', 'method'=>'post')) !!}
    <div class="form-group">

        {!! Form::label('name', '照片类型名称'); !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        {!! Form::label('label', '类型描述'); !!}
        {!! Form::text('label', null, ['class' => 'form-control']) !!}

        {!! Form::label('status', '状态'); !!}
        {!! Form::select('status', ['禁用', '可用'], 1, ['class' => 'form-control']) !!}

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