@extends('admin.layout.index')

@section('content')
    <div class="container-fluid-full">
        <div class="row-fluid">
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
        </div>
            <div class="row-fluid sortable">
                <div class="box span12">
                <div class="box-header">
                        <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>{{$title}}</h2>
                </div>

                <div class="box-content">

                <form class="form-horizontal" action="{{url('admin/adminuser/'.$data->id)}}" method="post" enctype="multipart/form-data" id="myform" >
                        {{ csrf_field() }}
                        {{method_field('put')}}
                    <div class="control-group success">
                        <label class="control-label" for="Admin_Name">管理员名</label>
                        <div class="controls">
                          <input type="text" id="admin_name" name="admin_name" value="{{$data->admin_name}}" readonly>
                        </div>
                    </div>
                    <div class="control-group success">
                        <label class="control-label" for="Admin_Email">邮箱</label>
                        <div class="controls">
                          <input type="email" id="admin_email" value="{{$data->admin_email}}" name="admin_email">
                        </div>
                    </div>
                    <div class="control-group success">
                        <label class="control-label" for="fileInput">头像上传</label>
                        <div class="controls">
                            <div class="uploader" id="uniform-fileInput">
                                <input class="input-file uniform_on" id="photo" name="admin_photo" type="file">
                                <span class="filename" style="-moz-user-select: none;">No file selected</span>
                                <span class="action" style="-moz-user-select: none;">Choose File</span>
                            </div>

                            <div style="margin-top:10px;"><p><img id="img1" src="{{'/'.$data->admin_photo}}" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p></div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="添加">
                        <input type="reset" value="重置">
                    </div>
                  </form>
            </div>
             <script src="/a/js/jquery-1.9.1.min.js"></script>
            <script type="text/javascript">

                $(function () {

                    $("#photo").change(function () {
                        uploadImage();
                    });
                });

                function uploadImage() {
        //                            判断是否有选择上传文件
                    var imgPath = $("#photo").val();
                    console.log('imgPath');
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
        //                            var myform = document.getElementById('art_from');
                        var formData = new FormData();
                        formData.append("admin_photo", $('#photo')[0].files[0]);
                        formData.append("_token", '{{csrf_token()}}');
                    $.ajax({
                        type: "POST",
                        url: "/admin/upload",
                        data: formData,
                        async: true,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                                           // console.log(data);
        //                                    alert("上传成功");
                            $('#img1').attr('src','http://phvbylvgz.bkt.clouddn.com/'+data);

                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("上传失败，请检查网络后重试");
                        }

                    });
                }

            </script>
                </div><!--/span-->
            </div><!--/row-->
@endsection