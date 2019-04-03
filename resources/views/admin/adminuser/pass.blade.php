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

                <form class="form-horizontal" action="{{url('admin/pass')}}" method="post">
                        {{csrf_field()}}

                    <div class="control-group success">
                        <label class="control-label" for="Password_old">原密码</label>
                        <div class="controls">
                          <input type="password" id="pass_o" name="pass_o">
                        </div>
                    </div>
                    <div class="control-group success">
                        <label class="control-label" for="Password_new">新密码</label>
                        <div class="controls">
                          <input type="password" id="admin_pass" name="admin_pass">
                        </div>
                    </div>
                    <div class="control-group success">
                        <label class="control-label" for="Repassword">确认密码</label>
                        <div class="controls">
                          <input type="password" id="repass" name="pass_c">
                        </div>
                    </div>

                    <div class="form-actions">
                        <input type="submit" value="修改">
                        <input type="reset" value="重置">
                    </div>
                  </form>
            </div>

                </div><!--/span-->
            </div><!--/row-->
@endsection