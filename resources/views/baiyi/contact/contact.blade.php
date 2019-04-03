@extends('baiyi.layout.index')
@section('content')

<div class="section">
      <div class="container">
        <div class="section--header">
            <h2 class="section--title">百艺工坊</h2>
            <p class="section--description">
                百艺工坊—国内首家传统手工艺少儿文创教育品牌，也是国内唯一一家打通教育端和商业端的少儿文创品牌。以其严谨、专业的课程设计理念及中国传统手工艺经验为少儿文创行业提供更加专业的、立体的产品。
            </p>
        </div>

        <div class="section-container">
          <div class="am-g">
            <!--contact-left start-->
            <div class="am-u-md-5">
              <ul class="contact-left">
                <li class="contact-box-item">
                  <div class="contact_item">
                    <i class="contact_item--icon am-icon-phone"></i>
                    <h3 class="contact_item--title">咨询电话</h3>
                    <p class="contact_item--text">
                        联系电话： <strong>400-900-7795</strong>,
                        <br> 周一~周五, 9:00 - 18:00
                    </p>
                </div>
                </li>
                <li class="contact-item">
                  <div class="contact_item">
                    <i class="contact_item--icon am-icon-envelope-o"></i>
                    <h3 class="contact_item--title">电子邮箱</h3>
                    <p class="contact_item--text">
                      baiyigongfang@163.com <br/>期待您的来信...
                    </p>
                </div>
                </li>
                <li class="contact-item">
                  <div class="contact_item">
                    <i class="contact_item--icon am-icon-map-marker"></i>
                    <h3 class="contact_item--title">公司位置</h3>
                    <p class="contact_item--text">
                        北京市丰台区科技园百强大道六号院1-60 一层
                    </p>
                </div>
                </li>
              </ul>
            </div>
            <!--contact-left end-->

            <!--contact-right start-->
              <div class="am-u-md-7">
                <div class="contact-form">
                  <h3 class="contact-form_title">公司位置</h3>
                  <form class="am-form">
                    <img src="{{url('h/images/contact/contact.jpg')}}" alt="" />
                  </form>
                </div>
              </div>
            <!--contact-right end-->
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection