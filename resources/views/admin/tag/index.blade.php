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
                        <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>{{$title}}</h2>
                    </div>

                    <div class="box-content">
                        <div class="row-fluid">
                            <form method="get" action="/admin/tag">
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
                                            关键字: <input type="text" name="keys" value="{{$request['keys'] or ''}}" aria-controls="DataTables_Table_0">
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
                                              <th>分类名</th>
                                              <th>标签名</th>
                                              <th>操作</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($data as $k=>$v)
                                        <tr>
                                            <td class="center">{{$v->tag_id}}</td>
                                            <td class="center">{{$v->cate_name}}</td>
                                            <td class="center">{{$v->tag_name}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-info" href="#">
                                                    <i class="halflings-icon white edit"></i>
                                                </a>
                                                <a class="btn btn-danger" href="javascript:void(0)" onclick="delTag({{$v->tag_id}})">
                                                    <i class="halflings-icon white trash"></i>
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

                                function delTag(tid){

                                    layer.confirm('是否确认删除？', {
                                        btn: ['确认','取消'] //按钮
                                    }, function(){

                                        $.post('{{url('admin/tag/')}}/'+tid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                                            //console.log(data);
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