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
                        <h2><i class="halflings-icon white align-justify"></i><span class="break">回复列表</span></h2>
                    </div>

                    <div class="box-content">
                        <div class="row-fluid">
                            <form method="get" action="/admin/answer">
                                <div class="span6">
                                    <div id="DataTables_Table_0_length" class="dataTables_length">

                                       <label>
                                        每页显示
                                        <select size="1" name="count" aria-controls="DataTables_Table_0">
                                            <option value="3" @if(!empty($request['count']) && $request['count'] == 3) selected @endif>3</option>
                                            <option value="5" @if(!empty($request['count']) && $request['count'] == 5) selected @endif>5</option>
                                            <option value="7" @if(!empty($request['count']) && $request['count'] == 7) selected @endif>7</option>
                                            <option value="10" @if(!empty($request['count']) && $request['count'] == 10) selected @endif>10</option>
                                        </select>
                                         条
                                    </label>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                        <label>
                                        关键字: <input type="text" name="search" value="{{$request['search'] or ''}}" aria-controls="DataTables_Table_0">
                                        <input type="submit" value="搜索">
                                    </label>
                                    </div>
                                </div>
                            </form>

                            <form action="" method="post">
                                <table class="table table-bordered table-striped table-condensed">
                                      <thead>
                                          <tr>
                                              <th>ID</th>
                                              <th>用户名</th>
                                              <th>问题标题</th>
                                              <th>回复内容</th>
                                              <th>状态</th>
                                              <th>创建时间</th>
                                              <th>操作</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($data as $k=>$v)
                                        <tr>
                                            <td class="center">{{$v['a_id']}}</td>
                                            <td class="center">{{$v['uid']}}</td>
                                            <td class="center">{{$v['q_title']}}</td>
                                            <td class="center">{{$v['a_content']}}</td>
                                            <td class="center">{{$v['a_status']}}</td>
                                            <td class="center">{{$v['a_time']}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-info" href="/admin/answer/{{$v['a_id']}}/edit">
                                                    <i class="halflings-icon white edit" title="查看"></i>
                                                </a>
                                                <a class="btn btn-danger"  href="javascript:void(0)" onclick="history({{$v['a_id']}})">
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
                            <script>

                                function history(a_id){

                                    layer.confirm('是否确认放入回收站？', {
                                        btn: ['确认','取消'] //按钮
                                    }, function(){

                                        $.post('{{url('admin/answer/')}}/'+a_id,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                                            // console.log(data);
                            //                    删除成功
                                            if(data.status == 0){
                                                layer.msg(data.msg, {icon: 6});
                                                location.href = location.href;
                                            }else{
                                                layer.msg(data.msg, {icon: 5});
                                                location.href = location.href;
                                            }
                                        });

                                    }, function(){

                                    });
                                }
                            </script>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection