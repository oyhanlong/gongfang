@extends('admin.layout.index')
@section('content')
        <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin/category">标签首页</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/category">标签管理</a></li>
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
                    <h2><i class="halflings-icon white edit"></i><span class="break"></span>{{$title}}</h2>
                </div>
                <div class="box-content">
                    <form class="form-horizontal" action="/admin/tag" method="post">
                        {{csrf_field()}}
                          <div class="control-group success">
                            <label class="control-label" for="inputSuccess">标签名称</label>
                            <div class="controls">
                              <input type="text" id="tag_name" name="tag_name">
                            </div>
                          </div>
                          <div class="control-group success">
                            <label class="control-label" for="selectError3">选择父分类</label>
                            <div class="controls">
                             <select name="funame" id="p_cate">
                             <option>--请选择--</option>
                             @foreach($pcate as $k => $v)
                              <option value="{{$v['id']}}" id="Pcate">{{$v['cate_name']}}</option>
                               @endforeach
                              </select>
                              <select id="c_cate" name="cid">
                                  <option>--请选择--</option>
                                  <option value=""></option><br><br>
                              </select>
                            </div>
                          </div>
                          <div class="form-actions">
                            <button type="submit" class="btn btn-primary">确认添加</button>
                            <button type="reset" class="btn">重置</button>
                          </div>
                      </form>
                      <script src="/a/js/jquery-1.9.1.min.js"></script>
                      <script>
                          var p_cate=document.getElementById('p_cate');
                          var c_cate=document.getElementById('c_cate');
                          p_cate.onchange=function()
                          {
                              var str=p_cate.value;

                              c_cate.options.length = 0;

                              $.get('/admin/tag/fenlei',{'id':str},function(msg)
                              {

                                   var arr = JSON.parse(msg) ;

                                    $.each( arr, function(i,n)
                                    {
                                     $('#c_cate').append("<option value='"+n.id+"'>"+n.cate_name+"</option>");

                                    });


                              });
                          }
                      </script>
                </div>
            </div><!--/span-->

        </div>
        <script src="/a/js/jquery-1.9.1.min.js"></script>
        <script>
          $(function(){
            var parentName = $('#pcate').val();
            // alert(parentName);
          });
         </script>
@endsection
