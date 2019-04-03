@extends('admin.layout.index')

@section('content')

	<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>网站配置列表</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>网站名称</th>
									  <th>网站标语</th>
									  <th>网站logo</th>
									  <th>网站版权</th>
									  <th>网站备案号</th>
									  <th>网站联系电话</th>
									  <th>网站联系邮箱</th>
									  <th>网站关键字</th>
									  <th>网站描述</th>
									  <th>网站状态</th>
									   <th>操作</th>
								  </tr>
							  </thead>
							  <tbody>
							  @foreach($data as $k=>$v)
								<tr style="height:80px;">
									<td>{{$v['web_name']}}</td>
									<td>{{$v['slogan']}}</td>
									<td><img src="{{$v['web_logo']}}" style="width:125px;height:80px;"></td>
									 <td>{{$v['copyright']}}</td>
									 <td>{{$v['record_number']}}</td>
									 <td>{{$v['web_telphone']}}</td>
									 <td>{{$v['web_email']}}</td>
									 <td>{{$v['web_keyword']}}</td>
									 <td>{{$v['web_description']}}</td>
									 <td>{{$v['web_status']}}</td>
									 <td>
									 	<a href="/admin/config/{{$v['web_id']}}/edit"><button style="width:83px;">修改</button></a><span>&nbsp&nbsp</span>
									 	<form action="/admin/config/{{$v['web_id']}}" method="post">
									 	{{csrf_field()}}
									 	<input type="hidden" name="_method" value="DELETE">
									 		<input type="submit" value="删除">
									 	</form>
									 </td>
								</tr>
								@endforeach
							  </tbody>
						 </table>
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>
					</div>
				</div>
				{!! $data->appends($request)->render()!!}
@endsection