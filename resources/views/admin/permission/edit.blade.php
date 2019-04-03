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

                <form class="form-horizontal" action="{{url('admin/permission/'.$per->id)}}" method="post" enctype="multipart/form-data" id="myform" >
                        {{ csrf_field() }}
                        {{method_field('put')}}
                    <div class="control-group success">
                        <label class="control-label" for="per_name">权限名</label>
                        <div class="controls">
                          <input type="text" id="per_name" name="per_name" value="{{$per->per_name}}"><strong></strong>
                        </div>
                    </div>
                    <div class="control-group success">
                        <label class="control-label" for="per_description">权限描述</label>
                        <div class="controls">
                          <input type="text" id="per_description" name="per_description" value="{{$per->per_description}}"><strong></strong>
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