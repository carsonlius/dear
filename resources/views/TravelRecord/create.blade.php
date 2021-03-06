@extends('layouts.nav_without_right_side');
@section('content')
    <div class="form-group">
        <h3>create photo</h3>
    </div>
    {!! Form::open(array('url' => 'TravelRecord/store', 'method'=>'post', 'files'=> true)) !!}
    <div class="form-group">
        {!! Form::label('photo-type', '照片类型') !!}
        {!! Form::select('type', $type_list, $type_first, ['class' => 'form-control']) !!}

        {!! Form::label('protagonist', '主角'); !!}
        {!! Form::text('protagonist', '彭彭', ['class' => 'form-control']) !!}

        {!! Form::label('title', '标题') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}

        {!! Form::label('shot time', '拍摄时间') !!}
        {{--<input type="date" name="shot_time" value="" class="form-control">--}}
        {!! Form::date('shot_time', \Carbon\Carbon::now(), ["class"=>"form-control"]); !!}

        {!! Form::label('content', '照片的描述') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}

        {!! Form::label('img', '上传文件') !!}
        {!! Form::file('img', ['class' => 'form-control']) !!}

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