@extends('admin.layout.index')

@section('content')


    <div class="box-header">
        <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>{{$title}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    <div class="row-fluid">
        <div class="span6">
            <div id="DataTables_Table_0_length" class="dataTables_length">
             <form action="/admin/homeuser" method="get">
                <label>
                显示
                <select size="1" name="count" aria-controls="DataTables_Table_0">
                    <option value="3" @if(!empty($request['count']) && $request['count'] == 3) selected @endif >3</option>
                    <option value="5" @if(!empty($request['count']) && $request['count'] == 5) selected @endif >5</option>
                    <option value="10" @if(!empty($request['count']) && $request['count'] == 10) selected @endif >10</option>
                    <option value="15" @if(!empty($request['count']) && $request['count'] == 15) selected @endif >15</option>
                </select>
                 条</label>
            </div>
        </div>
        <div class="span6">
            <div class="dataTables_filter" id="DataTables_Table_0_filter">
                <label>关键字 <input type="text" name="search" aria-controls="DataTables_Table_0" value="{{$request['search'] or ''}}"  >
                           <input type="submit" class="btn btn-info"  value="搜索" style="height: 29px; margin-bottom: 10px;padding-top: 4px;">
                </label>
            </div>
        </div>
        </form>

    </div>
    <div class="box-content">
        <table class="table table-bordered table-striped table-condensed">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>昵称</th>
                    <th>头像</th>
                    <th>年龄</th>
                    <th>性别</th>
                    <th>等级</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                <tr style="height:80px;">
                  <td>{{$v['id']}}</td>
                  <td>{{$v['nickname']}}</td>
                  <td><img src="{{$v['photo']}}" style="width:125px;height:80px;"></td>
                   <td>{{$v['age']}}</td>
                   <td>{{$v['sex']}}</td>
                   <td>{{$v['level']}}</td>
                </tr>
                @endforeach
                </tbody>
             </table>
         <div class="pagination pagination-centered">
          <ul>
             {!! $data->appends($request)->render() !!}
          </ul>
        </div>
    </div>
    </div>
</div>
@endsection