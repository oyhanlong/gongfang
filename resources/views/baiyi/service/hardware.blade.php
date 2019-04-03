@extends('baiyi.layout.index')
@section('content')

    <div class="section">
      <div class="container">
        <div class="section--header">
          <h2 class="section--title">设备维修</h2>
          <p class="section--description">
            我们的硬件设备均为自主研发，并设有专门的配件库，同时有专业的维修团队可随时根据硬件设备问题进行维修服务。
          </p>
        </div>

      <div class="solution-container">
          <div data-am-widget="tabs" class="am-tabs ">
              <ul class="am-tabs-nav am-cf">
                  <li class="am-active"><a href="[data-tab-panel-0]">陶工坊</a></li>
                  <li class=""><a href="[data-tab-panel-1]">木工坊</a></li>
                  <li class=""><a href="[data-tab-panel-2]">纸工坊</a></li>
                  <li class=""><a href="[data-tab-panel-3]">农工坊</a></li>
              </ul>
              <div class="am-tabs-bd">
                  <div data-tab-panel-0 class="am-tab-panel am-active">
                    <div class="am-g">
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/ceramic/ceramic01.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/ceramic/ceramic02.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/ceramic/ceramic03.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/ceramic/ceramic04.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/ceramic/ceramic05.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/ceramic/ceramic06.png')}}" alt="" /></a>
                      </div>
                    </div>
                  </div>
                  <div data-tab-panel-1 class="am-tab-panel ">
                    <div class="am-g">
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/timber/machine01.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/timber/machine02.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/timber/machine03.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/timber/machine04.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/timber/machine05.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/timber/machine06.png')}}" alt="" /></a>
                      </div>
                    </div>
                  </div>
                  <div data-tab-panel-2 class="am-tab-panel ">
                    <div class="am-g">
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/paper/electrical01.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/paper/electrical02.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/paper/electrical03.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/paper/electrical04.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/paper/electrical05.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/paper/electrical06.png')}}" alt="" /></a>
                      </div>
                    </div>
                  </div>
                  <div data-tab-panel-3 class="am-tab-panel ">
                    <div class="am-g">
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/farming/Throwing_machine01.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/farming/Throwing_machine02.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/farming/Throwing_machine03.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/farming/Throwing_machine04.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/farming/Throwing_machine05.png')}}" alt="" /></a>
                      </div>
                      <div class="am-u-md-4 am-u-sm-6">
                        <a href="#"><img src="{{url('h/images/solution/farming/Throwing_machine06.png')}}" alt="" /></a>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>

@endsection