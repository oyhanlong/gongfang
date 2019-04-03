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

                <form class="form-horizontal" action="{{url('admin/permission')}}" method="post" enctype="multipart/form-data" id="myform" >
                        {{ csrf_field() }}
                    <div class="control-group success">
                        <label class="control-label" for="per_name">权限名</label>
                        <div class="controls">
                          <input type="text" id="per_name" name="per_name"><strong></strong>
                        </div>
                    </div>
                    <div class="control-group success">
                        <label class="control-label" for="per_description">权限描述</label>
                        <div class="controls">
                          <input type="text" id="per_description" name="per_description"><strong></strong>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="添加">
                        <input type="reset" value="重置">
                    </div>
                  </form>
            </div>
            <!-- <script type="text/javascript" src="/a/ajax3.0-min.js"></script> -->
            <!-- <script type="text/javascript">
                //获取元素
                var per_name = document.getElementById('per_name');

                var per_description = document.getElementById('per_description');
                var strong = document.getElementsByTagName('strong');
                //验证角色名
                per_name.onfocus = function(){
                    strong[0].innerHTML = '<font color="blue">请输入6-16位字母，数字 下划线组合</font>'
                }

                per_name.onkeyup = function(){

                }

                per_name.onblur = function(){
                    var uv = this.value;
                    var preg_name = /^[a-zA-Z0-9_]{6,16}$/;

                    if(preg_name.test(uv)){

                        strong[0].innerHTML = '<font color="green">✔</font>';

                    }else{
                        strong[0].innerHTML = '<font color="red">请输入6-16位字母，数字 下划线组合</font>';
                    }

                }

                // 验证邮箱
                per_description.onfocus = function(){

                    strong[1].innerHTML = '<font color="blue">请输入正确的邮箱</font>'
                }

                per_description.onblur = function(){

                    var ev = this.value;

                    var preg_per_description = /^[a-zA-Z0-9_]+@(qq|163|126|sina|aliyun|gmail)\.(com|cn|net)$/;
                    if(preg_per_description.test(ev)){

                        strong[1].innerHTML = '<font color="green">✔</font>';

                    }else{

                        strong[1].innerHTML = '<font color="red">邮箱不可用</font>';
                    }

                }
            </script> -->

                </div><!--/span-->
            </div><!--/row-->
@endsection