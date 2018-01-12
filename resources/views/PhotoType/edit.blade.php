@extends('layouts.nav_without_right_side');
@section('content')
    <div class="form-group">
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

        {!! Form::submit('发表文章', ['class' => 'btn btn-success form-control']) !!}
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