@extends('admin.layout.index')

@section('content')
	<ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin/category">分类首页</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/category">分类管理</a></li>
        </ul>
	<div class="container-fluid-full">
		<div class="row-fluid">
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>分类列表</h2>
					</div>
					<div class="box-content">

						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>ID</th>
									  <th>分类名称</th>
									  <th>父类ID</th>
									  <th>分类路径</th>
									  <th>分类状态</th>
									  <th>操作</th>
								  </tr>
							  </thead>
							  <tbody>
							  @foreach($data as $k=>$v)
								<tr>
									<td class="center">{{$v['id']}}</td>
									<td class="center">{{$v['cate_name']}}</td>
									<td class="center">{{$v['pid']}}</td>
									<td class="center">{{$v['path']}}</td>
									<td class="center">{{$v['status'] == 0 ? '启用' : '未启用'}}</td>
									<td class="text-center">
										<div>
												<a href="javascript:void(0)" onclick="showQue({{$v['id']}})">查看问题</a> |
												<a href="/admin/category/add/{{$v['id']}}">添加子分类</a> |
												<a href="javascript:void(0);" onclick="delCate({{$v['id']}})">删除</a>
										</div>

									</td>
								</tr>
							 @endforeach
							  </tbody>
						 </table>
					</div>
				</div><!--/span-->
			</div><!--/row-->

	<script>

			// 删除分类的ajax
			 function delCate(cateid)
			 {
			    layer.confirm('是否确认删除？', {
                btn: ['确认','取消'] //按钮
             }, function(){

                $.post('{{url('admin/category')}}/'+cateid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data)
                {

					switch(data['status'])
					{
						case 0:
							// 删除成功
	                        layer.msg(data.msg, {icon: 6});
	                        location.href = location.href;
							break;

						case 1:
							// 删除成功
	                        layer.msg(data.msg, {icon: 5});
	                        location.href = location.href;
							break;

						case 3:
							// 有子分类,不允许删除
	                        layer.msg(data.msg, {icon: 5});
	                        location.href = location.href;
							break;
					}

                });

            }, function(){

            });
        }

        // 显示问题列表的ajax
         function showQue(cateid){
            $.get('{{url('admin/category/')}}/'+cateid,{},function(data){
                //页面层
                layer.open({
                    type: 1,
                    skin: 'layui-layer-rim', //加上边框
                    area: ['620px', '340px'], //宽高
                    content: data
                });
            });

        }
	</script>

@endsection