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
			@if(count($errors)>0)
				    <div class="alert alert-block">
				    	验证失败
				        <ul>
				            @foreach ($errors->all() as $error)
				                {{ $error }}<br>
				            @endforeach
				        </ul>
			    	</div>
			@endif
		</div>
		
		<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
		</noscript>
		<div class="row-fluid sortable ui-sortable">
			<div class="box span12">
				<div class="box-header" data-original-title="">
					<h2><i class="halflings-icon white edit"></i><span class="break"></span>分类添加</h2>
				</div>
				<div class="box-content">
					<form class="form-horizontal" action="/admin/category" method="post">
						{{csrf_field()}}
						  <div class="control-group success">
							<label class="control-label" for="inputSuccess">分类名称</label>
							<div class="controls">
							  <input type="text" id="inputSuccess" name="cate_name">
							</div>
						  </div>
						  <div class="control-group success">
							<label class="control-label" for="selectError3">选择父分类</label>
							<div class="controls">
							  <select id="selectError3" name="pid">
								<option>--请选择--</option>
								 @foreach ($data as $k=>$v)
                            	 <option value="{{$v['id']}}" {{$v['id']==$id ? 'selected' : ''}}>{{$v['cate_name']}}</option>
                            	 @endforeach
							  </select>
							</div>
						  </div>
						  <div class="form-actions">
							<button type="submit" class="btn btn-primary">确认添加</button>
							<button type="reset" class="btn">重置</button>
						  </div>
					  </form>
				
				</div>
			</div><!--/span-->
		
		</div>

@endsection