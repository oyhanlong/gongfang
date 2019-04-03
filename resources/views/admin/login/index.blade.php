
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>{{Config::get('app.title')}}</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link id="bootstrap-style" href="/a/css/bootstrap.min.css" rel="stylesheet">
	<link href="/a/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="/a/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="/a/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="/a/http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="/a/css/ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="/a/css/ie9.css" rel="stylesheet">
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="/a/img/favicon.ico">
	<!-- end: Favicon -->

			<style type="text/css">
			body { background: url(/a/img/bg-login.jpg) !important; }
		</style>



</head>

<body>
		<div class="container-fluid-full">
		@if(session('success'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{session('error') }}
            </div>
        @endif

        @if (count($errors) > 0)
				<div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
					<ul>
						@if(is_object($errors))
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						@else
							<li>{{ $errors }}</li>
						@endif
					</ul>
				</div>
		@endif
		<div class="row-fluid">

			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href=""><i class="halflings-icon home"></i></a>
						<a href=""><i class="halflings-icon cog"></i></a>
					</div>
					<h2>后台登录</h2>
					<form class="form-horizontal" action="/admin/login" method="post">
					{{ csrf_field() }}
						<fieldset>

							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="admin_name" id="admin_name" type="text" placeholder="用户名"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="admin_pass" id="admin_pass" type="password" placeholder="密码"/>
							</div>
							<div class="input-prepend" title="Code">
								<span class="add-on"></span>
								<input class="input-large span10" name="code" id="code" type="text" placeholder="验证码" style="width:240px;"/>
								 <img src="/code" alt="" onclick="this.src=this.src+'?a='+Math.random()">
							</div>
							<div class="clearfix"></div>

							<label class="remember" for="remember"><input type="checkbox" id="remember" />记住我</label>

							<div class="button-login">
								<button type="submit" class="btn btn-primary">登录</button>
							</div>
							<div class="clearfix"></div>

					</form>
					<hr>

				</div><!--/span-->
			</div><!--/row-->


	</div><!--/.fluid-container-->

		</div><!--/fluid-row-->
	    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="/a/#">Admin templates</a></li>
					<li><a href="/a/http://themescloud.org">Bootstrap themes</a></li>
				</ul>
			</div>
		</div>
	<!-- start: JavaScript-->

		<script src="/a/js/jquery-1.9.1.min.js"></script>
	<script src="/a/js/jquery-migrate-1.0.0.min.js"></script>

		<script src="/a/js/jquery-ui-1.10.0.custom.min.js"></script>

		<script src="/a/js/jquery.ui.touch-punch.js"></script>

		<script src="/a/js/modernizr.js"></script>

		<script src="/a/js/bootstrap.min.js"></script>

		<script src="/a/js/jquery.cookie.js"></script>

		<script src='/a/js/fullcalendar.min.js'></script>

		<script src='/a/js/jquery.dataTables.min.js'></script>

		<script src="/a/js/excanvas.js"></script>
	<script src="/a/js/jquery.flot.js"></script>
	<script src="/a/js/jquery.flot.pie.js"></script>
	<script src="/a/js/jquery.flot.stack.js"></script>
	<script src="/a/js/jquery.flot.resize.min.js"></script>

		<script src="/a/js/jquery.chosen.min.js"></script>

		<script src="/a/js/jquery.uniform.min.js"></script>

		<script src="/a/js/jquery.cleditor.min.js"></script>

		<script src="/a/js/jquery.noty.js"></script>

		<script src="/a/js/jquery.elfinder.min.js"></script>

		<script src="/a/js/jquery.raty.min.js"></script>

		<script src="/a/js/jquery.iphone.toggle.js"></script>

		<script src="/a/js/jquery.uploadify-3.1.min.js"></script>

		<script src="/a/js/jquery.gritter.min.js"></script>

		<script src="/a/js/jquery.imagesloaded.js"></script>

		<script src="/a/js/jquery.masonry.min.js"></script>

		<script src="/a/js/jquery.knob.modified.js"></script>

		<script src="/a/js/jquery.sparkline.min.js"></script>

		<script src="/a/js/counter.js"></script>

		<script src="/a/js/retina.js"></script>

		<script src="/a/js/custom.js"></script>
	<!-- end: JavaScript-->

</body>
</html>
