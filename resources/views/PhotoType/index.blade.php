@extends('layouts.app')
@section('content')
    <div class="box">
        <div class="box-header with-border form-group">
            <span class="box-title content-header">照片类型列表</span>
            <a href="{{ URL::to('PhotoType/create') }}"><span class="btn btn-sm btn-success" style="float: right">添加照片类型</span></a>
        </div>
        <div class="box-body form-group">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>类型名称</th>
                    <th>类型描述</th>
                    <th>操作</th>
                </tr>
                @foreach($list_show as $show)
                    <tr>
                        <td>{!! $show['id'] !!}</td>
                        <td>{!! $show['name'] !!}</td>
                        <td>{!! $show['label'] !!}</td>
                        <td>
                            <span class="">{!! Html::link('PhotoType/edit/' . $show['id'], '编辑') !!}</span>
                            <span class="">{!! Html::link('PhotoType/destroy/' . $show['id'], '删除') !!}</span>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection