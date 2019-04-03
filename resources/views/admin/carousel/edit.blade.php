@extends('admin.layout.index')


@section('content')


		<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>动态修改</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/carousel/edit/{{$data->id}}" method="post" id="art_form" enctype="multipart/form-data">
							<fieldset>
							 {{ csrf_field() }}
							  <!-- <input type="hidden" name="_method" value="PUT"> -->
							  <div class="control-group">
							  <label class="control-label" for="typeahead">文章标题： </label>
							  <div class="controls">
								<input type="text" class="input-xlarge focused" name="c_title" value="{{$data->c_title}}">
								<p class="help-block">标题可写30个字</p>
							  </div>
							</div>
							 <div class="control-group">
							  <label class="control-label" for="typeahead">作者： </label>
							  <div class="controls">
								<input type="text" class="input-xlarge focused" name="c_editor" value="{{$data->c_editor}}">
								<p class="help-block">这里是默认长度</p>
							  </div>
							</div>
							  <div class="control-group warning">
								<label class="control-label" for="inputWarning">轮播图片</label>
								<div class="controls">
								  <input type="file" id="c_pic" name="c_pic">
								  <span>选择后显示图片</span>
								  <div>
								  	<img src="{{$data->c_pic}}" alt="" id="imgs" style="width:100px;height:100px;">
								  	<input type="text" id="c_path" name="c_path" value="{{$data->c_pic}}">
								  </div>

								</div>
							</div>
					<script src="/a/js/jquery-1.9.1.min.js"></script>
					<script>

		             $(function () {
			            $("#c_pic").change(function () {
			                showpic();

			            });
			        });

					function showpic()
					{
						//判断是否有选择上传文件
			            var imgPath = $("#c_pic").val();
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
			                url: "/admin/carousel/upload",
			                data: formData,
			                async: true,
			                cache: false,
			                contentType: false,
			                processData: false,
			                success: function(data) {

			                    $('#imgs').attr('src',data);
			                    $('#c_path').val(data);

			                },
			                error: function(XMLHttpRequest, textStatus, errorThrown) {
			                    alert("上传失败，请检查网络后重试");
			                }
			            });
					}

					</script>


							 <div class="control-group error">
								<label class="control-label" for="inputError">关键字：</label>
								<div class="controls">
								  <input type="text"  name="c_tag" value="{{$data->c_tag}}">
								  <input type="hidden" name="c_time" value="">
								  <span class="help-inline"></span>
								</div>
							 </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">描述：</label>
								<div class="controls">
								 	<textarea id="c_description" name="c_description">{{$data->c_description}}</textarea>
								 	<input type="hidden" name="c_time" value="">
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">内容：</label>
								<div class="controls" style="width: 500px; height: 250px;">
									<textarea class="cleditor" id="editor" name="c_content" style="display: none; width: 500px; height: 197px;">{{$data->c_content}}</textarea>

		                           <iframe frameborder="0" src="javascript:true;" style="width: 500px; height: 197px;"></iframe>

								</div>
							  </div>
								<div class="control-group success">
								<label class="control-label" for="inputSuccess">状态</label>
								<div class="controls">
								 <select id="selectError3" name="c_status">
									<option value="0" selected>开启</option>
									<option value="1">关闭</option>

								  </select>
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">修改</button>

							  </div>
							</fieldset>
						  </form>

					</div>
				</div>


@endsection