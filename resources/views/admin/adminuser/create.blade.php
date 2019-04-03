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

                <form class="form-horizontal" action="{{url('admin/adminuser')}}" method="post" enctype="multipart/form-data" id="myform" >
                        {{ csrf_field() }}
                    <div class="control-group success">
                        <label class="control-label" for="Admin_Name">管理员名</label>
                        <div class="controls">
                          <input type="text" id="admin_name" name="admin_name"><strong></strong>
                        </div>
                    </div>
                    <div class="control-group success">
                        <label class="control-label" for="Password">管理员密码</label>
                        <div class="controls">
                          <input type="password" id="admin_pass" name="admin_pass"><strong></strong>
                        </div>
                    </div>
                    <div class="control-group success">
                        <label class="control-label" for="Repassword">确认密码</label>
                        <div class="controls">
                          <input type="password" id="repass" name="repass">
                        </div>
                    </div>
                    <div class="control-group success">
                        <label class="control-label" for="Admin_Email">邮箱</label>
                        <div class="controls">
                          <input type="email" id="admin_email" name="admin_email"><strong></strong>
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

                            <div ><p><img id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p></div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <input type="submit" value="添加">
                        <input type="reset" value="重置">
                    </div>
                  </form>
            </div>
            <script type="text/javascript" src="/a/ajax3.0-min.js"></script>
            <script type="text/javascript">
                //获取元素
                var admin_name = document.getElementById('admin_name');
                var pass = document.getElementById('admin_pass');
                var email = document.getElementById('admin_email');
                var strong = document.getElementsByTagName('strong');
                //验证用户名
                admin_name.onfocus = function(){
                    strong[0].innerHTML = '<font color="blue">请输入6-16位字母，数字 下划线组合</font>'
                }

                admin_name.onkeyup = function(){

                }

                admin_name.onblur = function(){
                    var uv = this.value;
                    var preg_name = /^[a-zA-Z0-9_]{6,16}$/;

                    if(preg_name.test(uv)){

                       Ajax().get('{{url('admin/admin_name?admin_name=')}}'+uv,function(msg){

                        if(msg == 1){
                            strong[0].innerHTML = '<font color="red">用户名已存在</font>';

                        }else{
                            strong[0].innerHTML = '<font color="green">✔</font>';

                        }
                    });

                    }else{
                        strong[0].innerHTML = '<font color="red">请输入6-16位字母，数字 下划线组合</font>';
                    }

                }
                // 验证密码
                pass.onfocus = function(){
                    strong[1].innerHTML = '<font color="blue">请输入6-16位字母，数字 下划线组合</font>';
                }

                pass.onblur = function(){

                    if(pass.value.length<6 || pass.value.length>16){
                        strong[1].innerHTML = '<font color="#E36565">密码长度不符合</font>';

                    }else{
                        strong[1].innerHTML = '<font color="green">✔</font>';

                    }
                }
                // 验证邮箱
                email.onfocus = function(){

                    strong[2].innerHTML = '<font color="blue">请输入正确的邮箱</font>'
                }

                email.onblur = function(){

                    var ev = this.value;

                    var preg_email = /^[a-zA-Z0-9_]+@(qq|163|126|sina|aliyun|gmail)\.(com|cn|net)$/;
                    if(preg_email.test(ev)){

                        Ajax().get('{{url('admin/admin_email?admin_email=')}}'+ev,function(msg){

                            if(msg == 1){
                                strong[2].innerHTML = '<font color="red">该邮箱已存在</font>';

                            }else{
                                strong[2].innerHTML = '<font color="green">✔</font>';

                            }
                        });

                    }else{
                        strong[2].innerHTML = '<font color="red">邮箱不可用</font>';

                    }

                }
            </script>
            <script src="/a/js/jquery-1.9.1.min.js"></script>
            <script type="text/javascript">

                $(function () {

                    $("#photo").change(function () {
                        uploadImage();
                    });
                });

                function uploadImage() {
        //   判断是否有选择上传文件
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
        //  var myform = document.getElementById('art_from');
                    var formData = new FormData($('#myform')[0]);
                    $.ajax({
                        type: "POST",
                        url: "/admin/upload",
                        data: formData,
                        async: true,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {

                //   alert("上传成功");
                            $('#img1').attr('src','http://phvbylvgz.bkt.clouddn.com/'+data);

                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("上传失败，请检查网络后重试");
                        }
                    });
                }

            </script>
                </div>
            </div>
        </div>
@endsection