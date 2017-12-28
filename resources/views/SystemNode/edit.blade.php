@extends('layouts.app')
@section('content')
    <div class="form-group">
        <span><h3>编辑节点</h3></span>
    </div>
    <div class="form-group">
    </div>
    {!! Form::model($systemNode, array('url' => 'SystemNode/update', 'method'=>'post')) !!}
    <div class="form-group">
        {!! Form::hidden('id', $systemNode->id) !!}
        {!! Form::label('pid', '父节点') !!}
        {!! Form::select('pid', $node_first, 0, ['class' => 'form-control']) !!}

        <div class="form-group">
            {!! Form::label('name', '节点名称'); !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div>
            {!! Form::label('label', '节点描述'); !!}
            {!! Form::text('label', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('node', '节点控制'); !!}
            {!! Form::text('node', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('listorder', '同级节点排序') !!}
            {!! Form::text('listorder', 0 , ['class' => 'form-control', 'placeholder' => '值越大 则排序越靠前']) !!}
        </div>

        <div class="form-inline">
            {!! Form::label('is_show', '是否显示'); !!}
            {!! Form::radio('is_show', 0, false, ['class' => '']) !!}否
            {!! Form::radio('is_show', 1, true, ['class' => '']) !!}是
        </div>

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