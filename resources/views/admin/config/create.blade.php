@extends('admin.layout.index')

@section('content')

	<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>添加网站配置</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="/admin/config" enctype="multipart/form-data" id="art_form">
							<fieldset>
							  {{ csrf_field() }}

							  <div class="control-group warning">
								<label class="control-label" for="inputWarning">网站名称</label>
								<div class="controls">
								  <input type="text" id="inputWarning" name="web_name">

								</div>
							  </div>
							  <div class="control-group error">
								<label class="control-label" for="inputError">网站标语</label>
								<div class="controls">
								  <input type="text" id="inputError" name="slogan">

								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">网站logo</label>
								<div class="controls">
								<input type="text" name="art_thumb" id="art_thumb">
								  <input type="file" id="web_logo" name="web_logo" multiple="true">

								 <p><img id="imgs" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>
								</div>
							  </div>
			<script src="/a/js/jquery-1.9.1.min.js"></script>
			<script>


		            // var logo=document.getElementById('web_logo');
		            // logo.onchange=function(){
		            // 	showpic();
		            // }

		             $(function () {
			            $("#web_logo").change(function () {
			                showpic();

			            });
			        });

					function showpic()
					{
						//判断是否有选择上传文件
			            var imgPath = $("#web_logo").val();
			            if (imgPath == "") {
			                alert("请选择上传图片！");
			                return;
			            }
			            //判断上传文件的后缀名
			            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
			            if (strExtension != 'jpg' && strExtension != 'gif'
			                && strExtension != 'png' && strExtension != 'bmp') {
			                alert("请选择图片文件");
			                return;
			            }
			            //获取表单的值上传文件的
			             var formData = new FormData($('#art_form')[0]);
			            {{--formData.append('_token', '{{csrf_token()}}');--}}
			                                        {{--console.log(formData);--}}
			            $.ajax({
			                type: "POST",
			                url: "/admin/uploads",
			                data: formData,
			                async: true,
			                cache: false,
			                contentType: false,
			                processData: false,
			                success: function(data) {

			                    $('#imgs').attr('src',data);
			                    $('#art_thumb').val(data);

			                },
			                error: function(XMLHttpRequest, textStatus, errorThrown) {
			                    alert("上传失败，请检查网络后重试");
			                }
			            });
					}
			</script>



							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">版权</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="copyright">

								</div>
							  </div>
							 <div class="control-group success">
								<label class="control-label" for="inputSuccess">备案号</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="record_number" value="010-110">

								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">网站联系电话</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="web_telphone" value="010-120110">

								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">网站联系邮箱</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="web_email" value="mayun@qq.com">

								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">网站关键字</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="web_keyword" value="搜索">

								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">网站描述</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="web_description" value="搜索引擎公司">

								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">网站状态</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="web_description" value="搜索引擎公司">
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="selectError3">网站状态</label>
								<div class="controls">
								  <select id="selectError3" name="web_status">
									<option value="0">开启</option>
									<option value="1">维护</option>
								  </select>
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">添加</button>
								<button class="btn" type="reset">重置</button>
							  </div>
							</fieldset>
						  </form>

					</div>
				</div>

@endsection