@extends('layouts.app')
@section('content')
    <div class="form-group">

        <div class="form-control">
            {!! Form::label('system_show', 'ID') !!}
            {!! $systemNode['id'] !!}
        </div>

        <div class="form-control">
            {!! Form::label('system_show', 'name') !!}
            {!! $systemNode['name'] !!}
        </div>
        <div class="form-control">
            {!! Form::label('system_show', 'label') !!}
            {!! $systemNode['label'] !!}
        </div>

    </div>
@endsection