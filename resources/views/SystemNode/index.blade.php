@extends('layouts.app')
@section('content')
    <div class="box">
        <div class="box-header with-border form-group">
                <span class="box-title content-header">节点列表</span>
                <a href="{{ URL::to('SystemNode/create') }}"><span class="btn btn-sm btn-success" style="float: right">添加节点</span></a>
        </div>
        <div class="box-body form-group">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>节点名称</th>
                    <th>节点描述</th>
                    <th>节点Route</th>
                    <th>节点是否展示</th>
                    <th>节点排序</th>
                    <th>父级节点</th>
                    <th>操作</th>
                </tr>
                @foreach($list_show as $show)
                <tr>
                    <td>{!! $show['id'] !!}</td>
                    <td>{!! $show['name'] !!}</td>
                    <td>{!! $show['label'] !!}</td>
                    <td>{!! $show['node'] !!}</td>
                    <td><?= $show['is_show'] ? '显示' : '不显示' ;?></td>
                    <td>{!! $show['listorder'] !!}</td>
                    <td>{!! $show['pid'] !!}</td>
                    <td>
                        <span class="">{!! Html::link('SystemNode/edit/' . $show['id'], '编辑') !!}</span>
                        <span class="">{!! Html::link('SystemNode/destroy/' . $show['id'], '删除') !!}</span>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection