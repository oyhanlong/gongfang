@extends('admin.layout.index')

@section('content')
		<ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin/link">链接首页</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/link">友情链接管理</a></li>
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

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>添加链接</h2>
					</div>
					<div class="box-content">
				<form class="form-horizontal" action="/admin/link" method="post">
						{{csrf_field()}}
					  <div class="control-group success">
						<label class="control-label" for="inputSuccess">链接名称:</label>
						<div class="controls">
						  <input type="text" id="inputSuccess" name="f_name">
						</div>
					  </div>


					  <div class="control-group success">
						<label class="control-label" for="inputSuccess">链接地址:</label>
						<div class="controls">
						  <input type="text" id="inputSuccess" name="f_address">
						</div>
					  </div>

					  <div class="form-actions">
						<input type="submit" value="添加">
						<input type="reset" value="重置">
					  </div>
				  </form>
			</div>

				</div><!--/span-->
			</div><!--/row-->

@endsection