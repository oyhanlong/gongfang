@extends('admin.layout.index')

@section('content')
	<ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin/link">公告首页</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/link">公告管理</a></li>
        </ul>
	<div class="container-fluid-full">
		<div class="row-fluid">
			<div class="row-fluid sortable">
				<div class="box span12">

					<div class="box-header">
						<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>公告列表</h2>
					</div>

					<div class="box-content">
						<div class="row-fluid">
							<div class="span6">
								<div id="DataTables_Table_0_length" class="dataTables_length">
								<form method="get" action="/admin/placard">
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
								</form>
							</div>
						</div>
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>ID</th>
									  <th>公告标题</th>
									  <th>公告内容</th>
									  <th>发布时间</th>
									  <th>操作</th>
								  </tr>
							  </thead>
							  <tbody>
							  @foreach($data as $k=>$v)
								<tr>
									<td class="center">{{$v['id']}}</td>
									<td class="center">{{$v['p_title']}}</td>
									<td class="center">{{$v['p_content']}}</td>
									<td class="center">{{$v['p_time']}}</td>
									<td class="text-center">
										<div style="align:center;">
											<div style="float:left;">
												<a href="/admin/placard/{{$v['id']}}/edit"><button>修改</button></a>
												<a href="javascript:void(0);" onclick="delPlacard({{$v['id']}})"><button>删除</button></a>
											</div>
										</div>

									</td>
								</tr>
							 @endforeach
							  </tbody>
						 </table>
						 <div class="pagination pagination-centered">
						  <!-- <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul> -->
						 	{!! $data->appends($request)->render()!!}
						</div>
					</div>
				</div><!--/span-->
			</div><!--/row-->

		<script>
			 function delPlacard(placardid){

            layer.confirm('是否确认删除？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                // jQuery.post(url,data,success(data, textStatus, jqXHR),dataType)
                $.post('{{url('admin/placard')}}/'+placardid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data)
                {
						
                    if(data){
                    	// 删除成功
                        layer.msg(data.msg, {icon: 6});
                        location.href = location.href;
                    }else{
                    	// 删除失败
                        layer.msg(data.msg, {icon: 5});
                        location.href = location.href;
                    }
                });

            }, function(){

            });




        }
		</script>

@endsection