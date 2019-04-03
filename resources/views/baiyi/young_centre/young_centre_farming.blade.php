@extends('baiyi.layout.index')
@section('content')

  <div class="section">
      <div class="container">
        <div class="section--header">
            <h2 class="section--title">农工坊课程</h2>
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
                    <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/1.jpg')}}" alt=""></a>
                    <h3 class="our_mission--item_title">第一课：拧麻花（春季）</h3>

                  </div>
                </div>
               <div class="am-u-md-3">
                  <div class="our_mission--item">
                    <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/2.jpg')}}" alt=""></a>
                    <h3 class="our_mission--item_title">第二课：粽情端午（春季）</h3>

                  </div>
                </div>
              <div class="am-u-md-3">
                    <div class="our_mission--item">
                      <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/3.jpg')}}" alt=""></a>
                      <h3 class="our_mission--item_title">第三课：营养青菜（春季）</h3>

                    </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/4.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第四课：昆虫蝴蝶（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/5.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第五课：扁担（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/6.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第六课：五毒肚兜（春季）</h3>

                </div>
              </div>
              <!-- <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/7.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第七课：睡莲（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/8.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第八课：彩虹（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/9.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第九课：面具（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);young_centre_farming.blade.php" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/10.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十课：流萤飞火（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/11.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十一课：清明时节（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/12.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十二课：蜗牛（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/13.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十三课：生肖兔（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/14.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十四课：编织草帽（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/15.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十五课：风车（春季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/16.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十六课：沾染（春季）</h3>

                </div>
              </div> -->
              <br />
              <div class="am-u-md-3">
                  <div class="our_mission--item">
                    <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/17.jpg')}}" alt=""></a>
                    <h3 class="our_mission--item_title">第一课：腊梅（秋季）</h3>
                  </div>
                </div>
               <div class="am-u-md-3">
                  <div class="our_mission--item">
                    <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/18.jpg')}}" alt=""></a>
                    <h3 class="our_mission--item_title">第二课：首饰（秋季）</h3>
                  </div>
                </div>
              <div class="am-u-md-3">
                    <div class="our_mission--item">
                      <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/19.jpg')}}" alt=""></a>
                      <h3 class="our_mission--item_title">第三课：扎染（秋季）</h3>

                    </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/20.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第四课：立春（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/21.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第五课：茅草屋（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/22.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第六课：牛气冲天（秋季）</h3>

                </div>
              </div>
              <!-- <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/23.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第七课：多肉盆景（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/24.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第八课：花束（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/25.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第九课：粮仓（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/26.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十课：面食（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/27.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十一课：拼图（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/28.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十二课：镐（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/29.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十三课：五谷纳福（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/30.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十四课：八宝粥（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/31.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十五课：雪人（秋季）</h3>

                </div>
              </div>
              <div class="am-u-md-3">
                <div class="our_mission--item">
                  <a href="javascript:void(0);" class="figure our_mission--item_media"><img src="{{url('h/images/young/centre/farming/32.jpg')}}" alt=""></a>
                  <h3 class="our_mission--item_title">第十六课：年夜饭（秋季）</h3>

                </div>
              </div> -->
            </div>
          </div>
        </div>
        <!--about-container end-->

      </div>
    </div>



@endsection