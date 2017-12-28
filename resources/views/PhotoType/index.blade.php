@extends('layouts.app')
@section('content')
    @foreach($list_show as $list)
        <div class="form-group">
            {!! $list['id'] !!}
            {!! $list['name'] !!}
        </div>
    @endforeach
    {!! Html::ul($list_show); !!}
@endsection