@extends('layouts.app')
@section('content')
    <div class="box">
        <div class="box-header with-border form-group">
            <span class="box-title content-header">女神展示</span>
            <a href="{{ URL::to('Protagonist/create') }}"><span class="btn btn-sm btn-success" style="float: right">添加</span></a>
        </div>
        <div class="box-body form-group">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>女神名字</th>
                    <th>女神英文名字</th>
                    <th>描述</th>
                    <th>图像</th>
                    <th>操作</th>
                </tr>
                @foreach($list_show as $show)
                    <tr>
                        <td>{!! $show['id'] !!}</td>
                        <td>{!! $show['name'] !!}</td>
                        <td>{!! $show['name_en'] !!}</td>
                        <td>{!! $show['intro'] !!}</td>
                        <td style="width: 40px;height: 40px">{!! Html::image($show['location'], '', ['width' => '100px', 'height' => '200px']); !!}</td>
                        <td>
                            <span class="">{!! Html::link('Protagonist/edit/' . $show['id'], '编辑') !!}</span>
                            <span class="">{!! Html::link('Protagonist/destroy/' . $show['id'], '删除') !!}</span>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection