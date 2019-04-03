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

                <form class="form-horizontal" action="{{url('admin/adminuser/auth')}}" method="post" enctype="multipart/form-data" id="myform" >
                        {{ csrf_field() }}
                    <input type="hidden" name="admin_id" value="{{$user->id}}">
                    <div class="control-group success">
                        <label class="control-label" for="admin_Name">管理员用户名</label>
                        <div class="controls">
                          <input type="text" id="admin-name" name="admin_name" value="{{$user->admin_name}}"><strong></strong>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">相关角色</label>
                        <div class="controls">
                          @foreach($roles as $k=>$v)
                                {{--如果当前用户拥有这个角色--}}
                                @if(in_array($v->id ,$own_roles))
                            <label class="checkbox inline">
                            <div class="checker" id="uniform-inlineCheckbox1"><span><input id="auth" name="role_id[]" value="{{$v->id}}" type="checkbox" checked></span></div>{{$v->role_name}}
                            </label>
                            @else
                            <label class="checkbox inline">
                            <div class="checker" id="uniform-inlineCheckbox1"><span><input id="role" name="role_id[]" value="{{$v->id}}" type="checkbox"></span></div>{{$v->role_name}}
                            </label>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="提交">
                        <input type="reset" value="重置">
                    </div>
                  </form>
            </div>
                </div><!--/span-->
            </div><!--/row-->
@endsection