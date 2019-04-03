@extends('admin.layout.index')



@section('content')


	 <div class="container-fluid-full">
        <div class="row-fluid">
            <noscript>
                    <div class="alert alert-block span10">
                        <h4 class="alert-heading">Warning!</h4>
                        <p>You need to have <a href="/a/http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                    </div>
            </noscript>


            <div class="row-fluid sortable">
                <div class="box span12">

                    <div class="box-header">
                        <h2><i class="halflings-icon white align-justify"></i><span class="break">动态列表</span></h2>
                    </div>

                    <div class="box-content">
                        <div class="row-fluid">
                            <form method="get" action="/admin/carousel">
                                <div class="span6">
                                    <div id="DataTables_Table_0_length" class="dataTables_length">

                                        <label>
                                            每页显示
                                            <select size="1" name="count" aria-controls="DataTables_Table_0">
                                                <option value="3" >3</option>
                                                <option value="5" >5</option>
                                                <option value="7" >7</option>
                                                <option value="10" >10</option>
                                            </select>
                                             条
                                        </label>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                        <label>
                                            关键字: <input type="text" name="search" value="" aria-controls="DataTables_Table_0">
                                            <input type="submit" value="搜索">
                                        </label>
                                    </div>
                                </div>
                            </form>

                            <form action="" method="post">
                                <table class="table table-bordered table-striped table-condensed">
                                      <thead>
                                          <tr>
                                            <th class="tc">ID</th>
                                            <th>文章标题</th>
                                            <th>轮播图片</th>
                                            <th>点击量</th>
                                            <th>作者</th>
                                            <th>关键字</th>
                                            <th>描述</th>
                                            <th>文章状态</th>
                                            <th>发布时间</th>
                                            <th>操作</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($data as $k=>$v)
                                        <tr>
                                            <td class="center">{{$v['id']}}</td>
                                            <td class="center">{{$v['c_title']}}</td>
                                            <td class="center">{{$v['c_pic']}}</td>
                                            <td class="center">{{$v['c_view']}}</td>
                                            <td class="center">{{$v['c_editor']}}</td>
                                            <td class="center">{{$v['c_tag']}}</td>
                                            <td class="center">{{$v['c_description']}}</td>
                                            <td class="center">{{$v['c_status']}}</td>
                                            <td class="center">{{date('Y-m-d H:i:s',$v->c_time)}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-info" href="/admin/carousel/{{$v['id']}}/edit">
                                                    <i class="halflings-icon white edit" title="修改"></i>
                                                </a>


                                                <a class="btn btn-danger" href="/admin/carousel/do_history/{{$v['id']}}">
                                                    <i class="halflings-icon white trash" title="放入回收站"></i>
                                                </a>

                                            </td>
                                        </tr>
                                     	@endforeach
                                      </tbody>
                                </table>

                                 <div class="pagination pagination-centered">
                                    {!! $data->appends($request)->render()!!}
                                </div>
                            <form>


@endsection