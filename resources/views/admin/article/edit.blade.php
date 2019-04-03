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
    <div class="box span12">
        <div class="box-header" data-original-title="">
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>问题添加</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
            </div>
        </div>
    <div class="result_wrap box-content">
        <form action="{{url('admin/article/'.$art->art_id)}}" id="art_form" method="post"  enctype="multipart/form-data">
            <table class="add_tab">
                <tbody>
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <tr>
                        <th><i class="require">*</i>文章标题：</th>
                        <td>
                            <input type="text" class="lg" name="art_title" value="{{$art->art_title}}">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th>作者：</th>
                        <td>
                            <input type="text" name="art_editor" value="{{$art->art_editor}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>
                        </td>
                    </tr>
                    <tr class="control-group success">
                        <th><i class="control-label" for="inputSuccess">*</i>缩略图：</th>
                        <td class="controls">
                            <input type="text" name="art_thumb" id="art_thumb" value="{{$art->art_thumb}}">
                            {{--文件上传插件--}}
                            <input id="web_logo" name="art_thumb" type="file" multiple="true">
                            <p><img id="img1" src="{{$art->art_thumb}}" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>关键字：</th>
                        <td>
                            <input type="text" class="lg" name="art_tag" value="{{$art->art_tag}}">

                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="art_description">{{$art->art_description}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>内容：</th>
                        <td>

                        <div class="cleditorMain" style="width: 500px; height: 250px;">

                           <textarea class="cleditor" id="editor" name="art_content" style="display: none; width: 500px; height: 197px;">{{$art->art_content}}</textarea>

                           <iframe frameborder="0" src="javascript:true;" style="width: 500px; height: 197px;"></iframe>
                        </div>



                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

    <script type="text/javascript">
        $(function () {
            $("#web_logo").change(function () {
                uploadImage();
            });
        });

        function uploadImage() {
    //                            判断是否有选择上传文件
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
//                            var myform = document.getElementById('art_from');
            var formData = new FormData($('#art_form')[0]);
            {{--formData.append('_token', '{{csrf_token()}}');--}}
                                        {{--console.log(formData);--}}
            $.ajax({
                type: "POST",
                url: "/admin/upload",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
//                                    console.log(data);
//                                    alert("上传成功");
                    $('#img1').attr('src',data);
                    $('#art_thumb').val(data);

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