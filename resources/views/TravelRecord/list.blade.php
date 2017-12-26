@extends('layouts.app');
@section('content')
    {!! Html::ol($list_show, ['class' => 'form-group']); !!}
    <table>
        <tr>
            <td>主题</td>
            <td>image</td>
        </tr>
        @foreach ($list_show as $list )
            <tr>
                <td>{!! Form::label($list['title'], $list['title']) !!}</td>
                <td style="width: 400px;height: 400px">{!! Html::image($list['location'], $list['title']); !!}</td>
            </tr>
        @endforeach
    </table>

@endsection