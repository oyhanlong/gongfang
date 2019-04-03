@extends('baiyi.layout.index')
@section('content')

    <!--===========layout-container================-->
    <div class="js-silder">
       <div class="silder-scroll">
            <div class="silder-main">

                <div class="silder-main-img">
                    <img src="{{url('h/lunbo/images/1-1.jpg')}}" alt="">
                </div>
                <div class="silder-main-img">
                    <img src="{{url('h/lunbo/images/2-1.jpg')}}" alt="">
                </div>
                <div class="silder-main-img">
                    <img src="{{url('h/lunbo/images/3-1.png')}}" alt="">
                </div>
                 <div class="silder-main-img">
                    <img src="{{url('h/lunbo/images/4-1.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>


    <div class="section">
      <div class="container">
        <div class="section--header">
              <h2 class="section--title">百艺工坊</h2>
              <p class="section--description">
                  国内首家传统手工艺少儿文创教育品牌，也是国内唯一一家打通教育端和商业端的少儿文创品牌。以其严谨、专业的课程设计理念及中国传统手工艺经验为少儿文创行业提供更加专业的、立体的产品。
              </p>
          </div>

        <!--index-container start-->
        <div class="index-container">
          <div class="am-g">
            <div class="am-u-md-3">
              <div class="features_item">
                <img src="{{url('h/images/index/f01.jpg')}}" alt="">
                <h3 class="features_item--title">陶工坊</h3>
                <p class="features_item--text">
                    即为陶瓷艺术，是中华民族传承最悠久的艺术形式之一。
                </p>
            </div>
            </div>
            <div class="am-u-md-3">
              <div class="features_item">
                <img src="{{url('h/images/index/f02.jpg')}}" alt="">
                <h3 class="features_item--title">纸工坊</h3>
                <p class="features_item--text">
                    造纸术是中国四大发明之一，以纸作为载体的创作形式经过千余年的发展。
                </p>
            </div>
            </div>
            <div class="am-u-md-3">
              <div class="features_item">
                  <img src="{{url('h/images/index/f03.jpg')}}" alt="">
                  <h3 class="features_item--title">木工坊</h3>
                  <p class="features_item--text">
                      现代木艺在继承和发扬传统木艺的基础上，为我们提供了更多的操作便利性。
              </div>
            </div>
            <div class="am-u-md-3">
              <div class="features_item">
                  <img src="{{url('h/images/index/f04.jpg')}}" alt="">
                  <h3 class="features_item--title">农工坊</h3>
                  <p class="features_item--text">
                      农耕文化是中国人民在长期农业生产生活中形成的一种风俗文化。
                  </p>
              </div>
            </div>
          </div>

          <div class="index-more">
            <a href="{{url('baiyi/creator')}}" type="button" class="am-btn am-btn-secondary">更多&nbsp;&nbsp;>></a>
          </div>
        </div>
        <!--index-container end-->
      </div>
    </div>
  </div>

  <!--promo_detailed start-->
  <div class="promo_detailed">
    <div class="promo_detailed-container" >
      <div class="container">
        <div class="am-g">
          <div class="am-u-md-6">
            <ul class="promo_detailed--list">
              <li class="promo_detailed--list_item">
                <span class="promo_detailed--list_item_icon">
                  <i class="am-icon-diamond"></i>
                </span>
                <dl>
                  <dt>课程管理功能</dt>
                  <dd>
                    百艺工坊专注于儿童传统艺术教育，多年的一线教学经验支撑了课程研发团队编写出幼儿园小、中、大班传统艺术课程超过500节，小学初、中、高级传统艺术课程超过200节。
                  </dd>
                </dl>
              </li>
              <li class="promo_detailed--list_item">
                <span class="promo_detailed--list_item_icon">
                  <i class="am-icon-dollar" style="margin-left: 15px;"></i>
                </span>
                <dl>
                  <dt>培训管理功能</dt>
                  <dd>
                    百艺工坊针对合作商和合作园所院校提供相关培训课程，确保合作伙伴顺利经营。也可根据合作伙伴的需要，安排专业老师上门进行针对性培训。

                  </dd>
                </dl>
              </li>
              <li class="promo_detailed--list_item">
                <span class="promo_detailed--list_item_icon">
                  <i class="am-icon-bank" style="margin-left: 10px;"></i>
                </span>
                <dl>
                  <dt>运营管理功能</dt>
                  <dd>
                    百艺工坊会提供亲子课程，推广课程的活动方案，帮助园所招生和开展相应课程，打造园所特色。
                  </dd>
                </dl>
              </li>
            </ul>
          </div>

          <div class="am-u-md-6">
            <div class="promo_detailed--cta">
              <div class="promo_detailed-img am-show-sm-only" style="background-image: url('h/images/index/promo_detailed_bg.jpg');">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="promo_detailed-img am-hide-sm-only" style="background-image: url('h/images/index/promo_detailed_bg.jpg');">

      </div>
  </div>
 <!--  <div class="index-container">
    <div class="index-more" style="padding-top: 0px;">
      <a href="/html/solution.html" type="button" class="am-btn am-btn-secondary" >更多&nbsp;&nbsp;>></a>
    </div>
  </div> -->
  <!--promo_detailed end-->

  <div class="section"  style="border-bottom: 1px solid #e9e9e9;">
    <div class="container">
      <div class="section--header">
        <h2 class="section--title">我们的服务</h2>
        <p class="section--description">
          我们拥有完整的陶、纸、木、农艺课程体系和教学团队，拥有多年一线教室建设经验，可以为合作商和合作园所院校量身定制环创方案，提供教学、运营、技术培训，并提供后勤设备材料、运营管理、活动推广方面的支持。
        </p>
      </div>

      <!--index-container start-->
      <div class="index-container">
        <div class="am-g">
          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-diamond"></i>
              <h3 class="service_item--title">硬件服务</h3>
              <div class="service_item--text">
                  <p>百艺工坊的所有设备均拥有完整知识产权，针对儿童各个年龄段特点研发的设施设备安全可靠。</p>
              </div>
              <footer class="service_item--footer">
                <a href="{{url('baiyi/hardware')}}" >了解更多>></a>
              </footer>
            </div>
          </div>

          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-user"></i>
              <h3 class="service_item--title">运营服务</h3>
              <div class="service_item--text">
                                <p>百艺工坊为合作园所院校提供相关培训课程，确保特色功能教室顺利使用。</p>
                            </div>
              <footer class="service_item--footer"><a href="{{url('baiyi/operation')}}" >了解更多>></a></footer>
            </div>
          </div>

          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-umbrella"></i>
              <h3 class="service_item--title">活动服务</h3>
              <div class="service_item--text">
                                <p>为了丰富项目体验效果及课程趣味性，我们还会不定期开展一些寓教于乐的活动。</p>
                            </div>
              <footer class="service_item--footer"><a href="{{url('baiyi/activity')}}" >了解更多>></a></footer>
            </div>
          </div>

          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-briefcase"></i>
              <h3 class="service_item--title">技能服务</h3>
              <div class="service_item--text">
                                <p>百艺工坊的环创团队经过多年一线教室建设经验的积累， 对环创有着独特的理解和创新。</p>
                            </div>
              <footer class="service_item--footer"><a href="{{url('baiyi/skill')}}" >了解更多>></a></footer>
            </div>
          </div>
        </div>
      </div>
      <!--index-container end-->
    </div>
  </div>


  <div class="section">
      <div class="container">
        <div class="section--header">
          <h2 class="section--title">选择我们的理由</h2>
          <p class="section--description">
            我们拥有多名非遗传承人的支持并担任技术顾问；拥有国家相关教育机构的资金和政策等诸多支持；拥有景德镇陶瓷学院、中央美院等知名院校毕业的课程研发团队；设立有众多知名幼儿园、中小学的教学实践基地。
          </p>
        </div>
      </div>

      <div class="product3-show-container">
        <div class="container">
          <div class="am-g">
            <div class="am-u-md-6 product3-show-box">
              <div class="am-g">
                <div class="am-u-md-6">
                  <div class="product3-show-img">
                    <div class="product3-img-mask"></div>
                    <img src="{{url('h/images/index/product3_img_1.jpg')}}" alt="" />
                  </div>
                </div>
                <div class="am-u-md-6">
                  <div class="product3-show-content">
                    <h3>运营培训</h3>
                    <p>针对百艺工坊的运营模式，我们设计了运营手册，并在北京开展了相应的园所、商业运营培训，根据我们的经验扶持您的经营。</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="am-u-md-6 product3-show-box">
              <div class="am-g">
                <div class="am-u-md-6">
                  <div class="product3-show-img">
                    <div class="product3-img-mask"></div>
                    <img src="{{url('h/images/index/product3_img_2.jpg')}}" alt="" />
                  </div>
                </div>
                <div class="am-u-md-6">
                  <div class="product3-show-content">
                    <h3>教学培训</h3>
                    <p>在商业体面对顾客的教学方式与学校园所中面对学生的培训有着本质区别，在教学过程中我们往往会遇到很多问题，我们的专业培训师会凭借丰富的一线教学经验在培训课程中倾囊相授。</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="am-u-md-6 product3-show-box">
              <div class="am-g">
                <div class="am-u-md-6">
                  <div class="product3-show-img">
                    <div class="product3-img-mask"></div>
                    <img src="{{url('h/images/index/product3_img_3.jpg')}}" alt="" />
                  </div>
                </div>
                <div class="am-u-md-6">
                  <div class="product3-show-content">
                    <h3>技术培训</h3>
                    <p>对于传统手工艺来说，专业技能是非常重要要的，百艺工坊拥有专业的培训师团队，无论是入园基础培训，还是在798开设的进阶培训，都是经过无数市场验证的，行之有效的方式。</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="am-u-md-6 product3-show-box">
              <div class="am-g">
                <div class="am-u-md-6">
                  <div class="product3-show-img">
                    <div class="product3-img-mask"></div>
                    <img src="{{url('h/images/index/product3_img_4.jpg')}}" alt="" />
                  </div>
                </div>
                <div class="am-u-md-6">
                  <div class="product3-show-content">
                    <h3>课程支持</h3>
                    <p>百艺工坊专注于儿童传统艺术教育，多年的一线教学经验支撑了课程研发团队编写出幼儿园小、中、大班传统艺术课程超过500节，小学初、中、高级传统艺术课程超过200节。</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  <div class="section promo_banner-container">
    <!--index-container start-->
    <div class="promo_banner-box">
      <div class="container">
        <h2 class="promo_banner--title">&nbsp &nbsp期待您的加入</h2>
        <p class="promo_banner--text">
                    百艺工坊作为国内首家传统手工艺少儿文创教育品牌，产品和服务响应国家政策号召和文化发展趋势，在深度挖掘“以匠心·致未来”的文化理念中，将非遗文化融入校园的教育和孩子的生活，助力非遗的传承和发展。
        <!-- <footer class="promo_banner--footer">
            <a href="./html/contact.html" type="button" class="am-btn am-btn-secondary" >MORE>></a>
        </footer> -->
      </div>
    </div>
    <!--index-container end-->
  </div>



  <!--customer-logo start-->
    <div class="customer-logo">
      <div class="container">
        <div class="am-g">
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="http://www.ceiea.com/">
              <img class="normal-logo" src="{{url('h/images/index/customer_logo_Microsoft.png')}}" alt="" />
              <img class="am-active"  alt="" src="{{url('h/images/index/customer_logo_Microsoft_active.png')}}" alt="" />
            </a>
          </div>
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="http://www.cecec.org//">
              <img class="normal-logo" src="{{url('h/images/index/customer_logo_qhdx.png')}}" alt="" />
              <img class="am-active" src="{{url('h/images/index/customer_logo_qhdx_active.png')}}" alt="" />
            </a>
          </div>
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="http://www.bjkse.com/">
              <img class="normal-logo" src="{{url('h/images/index/customer_logo_gmw.png')}}" alt="" />
              <img class="am-active" src="{{url('h/images/index/customer_logo_gmw_active.png')}}" alt="" />
            </a>
          </div>
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="http://www.gov.cn/">
              <img class="normal-logo" src="{{url('h/images/index/customer_logo_gov.png')}}" alt="" />
              <img class="am-active" src="{{url('h/images/index/customer_logo_gov_active.png')}}" alt="" />
            </a>
          </div>
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="http://www.youjiao.com/">
              <img class="normal-logo" src="{{url('h/images/index/customer_logo_jl.png')}}" alt="" />
              <img class="am-active" src="{{url('h/images/index/customer_logo_jl_active.png')}}" alt="" />
            </a>
          </div>
          <div class="am-u-md-2 am-u-sm-4 customer-box">
            <a href="#">
              <img class="normal-logo" src="{{url('h/images/index/customer_logo_hx.png')}}" alt="" />
              <img class="am-active" src="{{url('h/images/index/customer_logo_hx_active.png')}}" alt="" />
            </a>
          </div>
        </div>
      </div>
    </div>
  <!--customer-logo end-->



@endsection