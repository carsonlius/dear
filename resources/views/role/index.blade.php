@extends('layouts.nav_without_right_side')
@section('content')
    <div class="box">
        <div class="box-header with-border form-group">
            <span class="box-title content-header">角色管理</span>
            <a href="{{ URL::to('Role/create') }}"><span class="btn btn-sm btn-success" style="float: right">添加角色</span></a>
        </div>
        <div class="box-body form-group">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>角色名称</th>
                    <th>slug</th>
                    <th>校色描述</th>
                    <th>操作</th>
                </tr>
                @foreach($list_show as $show)
                    <tr>
                        <td>{!! $show['id'] !!}</td>
                        <td>{!! $show['name'] !!}</td>
                        <td>{!! $show['slug'] !!}</td>
                        <td>{!! $show['description'] !!}</td>
                        <td>
                            <span class="btn btn-sm">{!! Html::link('Role/edit/' . $show['id'], '编辑') !!}</span>
                            <span class="btn btn-sm but-error">{!! Html::link('Role/destroy/' . $show['id'], '删除') !!}</span>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection