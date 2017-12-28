@extends('layouts.app')
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title content-header">Bordered Table</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>节点名称</th>
                    <th>节点描述</th>
                    <th>节点排序</th>
                    <th>父级节点</th>
                    <th>操作</th>
                </tr>
                @foreach($list_show as $show)
                <tr>
                    <td>{!! $show['id'] !!}</td>
                    <td>{!! $show['name'] !!}</td>
                    <td>{!! $show['label'] !!}</td>
                    <td>{!! $show['listorder'] !!}</td>
                    <td>{!! $show['pid'] !!}</td>
                    <td><span class="">{!! Html::link('SystemNode/edit/' . $show['id'], '编辑') !!}</span></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection