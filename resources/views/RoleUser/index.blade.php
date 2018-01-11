@extends('layouts.app')
@section('content')
    <div class="box">
        <div class="box-header with-border form-group">
            <span class="box-title content-header">用户管理</span>
            <a href="{{ URL::to('home') }}"><span class="btn btn-sm btn-success" style="float: right">首页</span></a>
        </div>
        <div class="box-body form-group">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>email</th>
                    <th>角色</th>
                    <th>操作</th>
                </tr>
                @foreach($list_show as $show)
                    <tr>
                        <td>{!! $show['id'] !!}</td>
                        <td>{!! $show['name'] !!}</td>
                        <td>{!! $show['email'] !!}</td>
                        <td>{!! $show['role_name'] !!}</td>
                        <td>
                            <span class="btn btn-sm">{!! Html::link('RoleUser/edit?id=' . $show['id'], '编辑') !!}</span>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection