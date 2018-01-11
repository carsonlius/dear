@extends('layouts.app')
@section('content')
    <div class="box">
        <div class="box-header with-border form-group">
            <span class="box-title content-header">角色权限管理</span>
            <a href="{{ URL::to('home') }}"><span class="btn btn-sm btn-success" style="float: right">首页</span></a>
        </div>
        <div class="box-body form-group">
            <table class="table table-bordered">
                <tr>
                    <th>角色ID</th>
                    <th>角色名称</th>
                    <th>权限</th>
                    <th>操作</th>
                </tr>
                @foreach($list_role as $show)
                    <tr>
                        <td>{!! $show['id'] !!}</td>
                        <td>{!! $show['name'] !!}</td>
                        <td>
                            @foreach($list_permissions as $permission)
                            {!! Form::checkbox('permission_id', $permission['id'],
                            (isset($list_permissions_choose[$show['id']]) && in_array($permission['id'], $list_permissions_choose[$show['id']]))) !!} {!! $permission['name'] !!}
                            @endforeach

                        </td>
                        <td>
                            <span class="btn btn-sm">{!! Html::link('PermissionRole/edit/' . $show['id'], '编辑') !!}</span>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection