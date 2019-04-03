@extends('baiyi.layout.index')
@section('content')

    <div class="section" >
        <div class="container">
            <div class="section--header">
                <h2 class="section--title">非遗综合实践基地</h2>
                <p class="section--description">
                    百艺工坊可以为教育基地、生态乐园、文化村等非遗综合实践基地提供包括陶艺、纸艺、木艺、农艺等非遗传统文化服务，包括实践教室的搭建、专业培训师的落地培训、设备材料的提供、运营支持等。
                </p>
            </div>
        </div>
        <div class="o2o-container">
          <div class="am-g">
            <div class="am-u-md-4">
              <div class="o2o-box">
                <img src="{{url('h/images/base/o2o-img-1.png')}}" alt="" />
                <div class="o2o-content">
                  <a href="{{url('baiyi/mount')}}" style="color:black" ><h3>新郑泰山基地</h3></a>
                  <p>新郑泰山教育基地，内设有各种各样的体验馆，适合中小学各个年龄层的孩子来学习和体验，培养孩子的综合实践能力、提升青少年的综合素质。</p>
                </div>
              </div>
            </div>
            <div class="am-u-md-4">
              <div class="o2o-box">
                <img src="{{url('h/images/base/o2o-img-2.png')}}" alt="" />
                <div class="o2o-content">
                  <a href="{{url('baiyi/zero')}}" style="color:black" ><h3>归零文化村</h3></a>
                  <p>归零文化村以自然教育、生态养生为项目主题，集体验、休闲、科普等功能于一体的农旅结合模式新型文化村。</p>
                </div>
              </div>
            </div>
            <div class="am-u-md-4">
              <div class="o2o-box">
                <img src="{{url('h/images/base/o2o-img-3.png')}}" alt="" />
                <div class="o2o-content">
                    <a href="{{url('baiyi/paradise')}}" style="color:black" ><h3>熊大熊二生态乐园</h3></a>
                  <p>熊大熊二生态乐园里面有陶艺、纸艺、木艺、农艺等在内的传统非遗文化体验区，适合少儿娱乐、亲子游玩、学生户外文化活动体验。</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

@endsection