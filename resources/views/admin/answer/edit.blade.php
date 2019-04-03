@extends('admin.layout.index')


@section('content')


        <div class="box span12">
                    <div class="box-header" data-original-title="">
                        <h2><i class="halflings-icon white edit"></i><span class="break"></span>查看回复</h2>
                        <div class="box-icon">
                            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal" action="/admin/answer/{{$data['a_id']}}" method="post">
                            <fieldset>
                             {{ csrf_field() }}
                              <input type="hidden" name="_method" value="PUT">
                              <div class="control-group warning">
                                <label class="control-label" for="inputWarning">问题标题</label>
                                <div class="controls">
                                  <input type="text" id="inputWarning" name="q_title" value="{{$que['q_title']}}" readonly>
                                  <span class="help-inline"></span>
                                </div>
                              </div>
                              <div class="control-group error">
                                <label class="control-label" for="inputError">回复内容</label>
                                <div class="controls">
                                <textarea name="a_content" id="" cols="30" rows="10">{{$data['a_content']}}</textarea>
                                  <!-- <input type="text" id="inputError" name="q_content" value="{{$data['q_content']}}"> -->
                                  <input type="hidden" name="a_time" value="{{date('Y-m-d H:i:s')}}">
                                  <span class="help-inline"></span>
                                </div>
                              </div>
                              <div class="control-group success">
                                <label class="control-label" for="inputSuccess">状态</label>
                                <div class="controls">
                                 <select id="selectError3" name="a_status">
                                    <option value="0" selected>开启</option>
                                    <option value="1">禁用</option>

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