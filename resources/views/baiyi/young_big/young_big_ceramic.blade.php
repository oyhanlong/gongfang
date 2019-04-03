@extends('baiyi.layout.index')
@section('content')

  <div class="section">
      <div class="container">
        <div class="section--header">
            <h2 class="section--title">陶工坊课程</h2>
            <p class="section--description">
                百艺工坊—国内首家传统手工艺少儿文创教育品牌，也是国内唯一一家打通教育端和商业端的少儿文创品牌。以其严谨、专业的课程设计理念及中国传统手工艺经验为少儿文创行业提供更加专业的、立体的产品。
            </p>
        </div>
        <!--about-container start-->
        <div class="about-container">
          <div class="our-mission">
            <div class="am-g">
                <div class="am-u-md-3">
                  <div class="our_mission--item">
                    <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/1.jpg')}}" alt=""></a>
                    <h3 class="our_mission--item_title">第一课：乌纱帽（春季）</h3>

                  </div>
                </div>
               <div class="am-u-md-3">
                  <div class="our_mission--item">
                    <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/2.jpg')}}" alt=""></a>
                    <h3 class="our_mission--item_title">第二课：碗与勺（春季）</h3>

                  </div>
                </div>
              <div class="am-u-md-3">
                    <div class="our_mission--item">
                      <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/3.jpg')}}" alt=""></a>
                      <h3 class="our_mission--item_title">第三课：新食器（春季）</h3>

                    </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/4.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第四课：沙漠之花（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/5.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第五课：清凉一夏（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/6.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第六课：荷塘（春季）</h3>

                </div>
              </div>
             <!--  <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/7.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第七课：泥板水杯（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/8.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第八课：釉下彩会（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/9.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第九课：一起来做客（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);young_big_timber.blade.php" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/10.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十课：杯子皇冠（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/11.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十一课：大龙虾(春季)</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/12.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十二课：赛龙舟（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/13.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十三课：我的好朋友（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/14.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十四课：罐（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/15.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十五课：会生气的鱼（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/16.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十六课：釉上彩绘（春季）</h3>

                </div>
              </div> -->
              <br />
              <div class="am-u-md-3">
                  <div class="our_mission--item">
                    <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/17.jpg')}}" alt=""></a>
                    <h3 class="our_mission--item_title">第一课：大黄鸭（秋季）</h3>
                  </div>
                </div>
               <div class="am-u-md-3">
                  <div class="our_mission--item">
                    <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/18.jpg')}}" alt=""></a>
                    <h3 class="our_mission--item_title">第二课：创意笔筒（秋季）</h3>
                  </div>
                </div>
              <div class="am-u-md-3">
                    <div class="our_mission--item">
                      <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/19.jpg')}}" alt=""></a>
                      <h3 class="our_mission--item_title">第三课：新食器（秋季）</h3>

                    </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/20.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第四课：玫瑰花开（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/21.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第五课：定格时间（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/22.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第六课：荷塘（秋季）</h3>

                </div>
              </div>
              <!-- <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/23.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第七课：笨笨猪（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/24.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第八课：釉下彩会（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/25.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第九课：向日葵（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/26.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十课：杯子皇冠（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/27.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十一课：私人飞机（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/28.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十二课：插秧苗（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/29.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十三课：汽车总动员（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/30.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十四课：罐（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/31.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十五课：鸟和巢（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/big/ceramic/32.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十六课：釉上彩绘（秋季）</h3>

                </div>
              </div> -->
            </div>
          </div>
        </div>
        <!--about-container end-->

      </div>
    </div>
<!-- product2-banner start-->
    <!-- <div class="product2-banner">
      <div class="container">
        <h2>统一的移动办公门户</h2>
        <p>
          Enterplorer提供企业级HTML5应用统一运行及管理平台，一个入口整合所有的企业级应用
        </p>
        <button type="button" class="am-btn am-btn-warning am-round">了解详情</button>
      </div>
    </div> -->
    <!-- product2-banner end-->


@endsection