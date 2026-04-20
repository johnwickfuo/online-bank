@php
    if ($settings->redirect_url != null or !empty($settings->redirect_url)) {
        header("Location: $settings->redirect_url", true, 301);
        exit();
    }
@endphp
@php
      $captcha = strtoupper(substr(md5(rand()), 0, 6)); // Generate random text
@endphp
@extends('layouts.base')
@section('title', 'Home')


@section('content')





    <!-- Hero Section Start -->
    <div class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 order-1">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Welcome to {{$settings->site_name}} International Bank</h3>
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Empowering your Day to Day Banking </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                               Simple and secure personal banking available in person, online, or on your device.
                            </p>
                        </div>
                        <!-- Section Title End -->

                        <div class="hero-content-form">
                            <form id="heroForm" action="#" method="POST">
                                <div class="form-group">
                                    <a href="register" class="btn-highlighted">Enrol New Account</a>
                                    <a href="login" class="btn-default">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Hero Content End -->
                </div>

                <div class="col-lg-4 order-lg-2 order-3">
                    <!-- Hero Images Start -->
                    <div class="hero-images">
                        <!-- Hero Image Start -->
                        <div class="hero-img">
                            <figure class="image-anime">
                                <img src="temp/custom/assets/images/hero-image.jpg" alt="">
                            </figure>
                        </div>
                        <!-- Hero Image End -->

                        <!-- Payment Method Image Start -->
                        <div class="payment-method-image">
                            <img src="temp/custom/assets/images/payment-method-image.png" alt="">
                        </div>
                        <!-- Payment Method Image End -->
                    </div>
                    <!-- Hero Images End -->
                </div>

                <div class="col-lg-4 col-md-6 order-lg-3 order-2">
                    <!-- Hero Counter Box Start -->
                    <div class="hero-counter-box">
                        <!-- Hero Counter Item Start -->
                        <div class="hero-counter-item">
                            <h2><span class="counter">13</span>M+</h2>
                            <p class="wow fadeInUp">The first credit card ever issued was made of cardboard and was introduced by American Express in 1958.</p>
                        </div>
                        <!-- Hero Counter Item End -->

                        <!-- Hero Counter Item Start -->
                        <div class="hero-counter-item">
                            <h2><span class="counter">0</span>%</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">we believe that you should keep more of what you earn. That's why we're excited to offer a 0% commission.</p>
                        </div>
                        <!-- Hero Counter Item End -->
                    </div>
                    <!-- Hero Counter Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Scrolling Ticker Section Start -->
    <div class="our-scrolling-ticker">
      <!-- Scrolling Ticker Start -->
      <div class="scrolling-ticker-box">
        <div class="scrolling-content">
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            International Banking
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Flexible Mortgage
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Low Rate Loans
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Secured Payments
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Market Data
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Credit/Debit Cards
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Insurance
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Business Loan
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Offshore Account
          </span>



          <span
            ><img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />Latest Financial
            News</span
          >
          <span
            ><img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />Security & Trust</span
          >
        </div>
        <div class="scrolling-content">
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            International Banking
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Flexible Mortgage
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Low Rate Loans
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Secured Payments
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Market Data
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Credit/Debit Cards
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Insurance
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Business Loan
          </span>
          <span>
            <img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />
            Offshore Account
          </span>



          <span
            ><img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />Latest Financial
            News</span
          >
          <span
            ><img src="temp/custom/assets/images/asterisk-icon.svg" alt="" />Security & Trust</span
          >
        </div>

      </div>
    </div>
    <!-- Scrolling Ticker Section End -->

<!-- App Download Section Start -->
<html>
 <head>
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="/_sdk/element_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body>
  <div class="app-download bg-section py-16" style="background: linear-gradient(135deg, #059669 0%, #10b981 100%);">
   <div class="container"><!-- Header Section -->
    <div class="row section-row align-items-center mb-5">
     <div class="col-lg-7"><!-- Section Title Start -->
      <div class="section-title">
       <h3 class="text-white text-uppercase mb-3" style="font-weight: 600; letter-spacing: 1px; font-size: 1.1rem;">Download Our App</h3>
       <h2 class="text-white mb-0" style="font-size: 2.5rem; font-weight: 700; line-height: 1.3;">Experience Seamless Banking Anytime, Anywhere</h2>
      </div><!-- Section Title End -->
     </div>
     <div class="col-lg-5"><!-- Section Title Content Start -->
      <div class="section-title-content" style="background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); border-radius: 15px; padding: 1.5rem;">
       <p class="text-white mb-0" style="font-size: 1.1rem; line-height: 1.7;">Enjoy the convenience of managing your finances directly from your mobile device. Our app offers a seamless and secure banking experience designed to fit your busy lifestyle.</p>
      </div><!-- Section Title Content End -->
     </div>
    </div><!-- Download Options -->
    <div class="row">
     <div class="col-md-6 mb-4 mb-md-0"><!-- Android Download Item Start -->
      <div class="app-download-item bg-white rounded shadow-lg p-4" style="border-radius: 15px; height: 100%;">
       <div class="d-flex align-items-center mb-4">
        <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: #e8f5e9; border-radius: 50%; margin-right: 1rem;"><i class="fab fa-android" style="font-size: 2rem; color: #4caf50;"></i>
        </div>
        <div>
         <h3 class="mb-1" style="color: #000; font-size: 1.5rem; font-weight: 700;">Android</h3>
         <p class="mb-0" style="color: #000; font-size: 0.9rem;">Get it on your Android device</p>
        </div>
       </div><a href="{{ url('/Globalsurefinance.apk') }}" class="btn btn-block d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #4caf50 0%, #45a049 100%); color: white; font-weight: 700; padding: 1rem; border-radius: 10px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(76, 175, 80, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(76, 175, 80, 0.3)';" download> <i class="fas fa-download mr-2"></i> Download for Android </a>
       <p class="text-center mt-3 mb-0" style="color: #000; font-size: 0.85rem;">Compatible with Android 5.0 and above</p>
      </div><!-- Android Download Item End -->
     </div>
     <div class="col-md-6"><!-- iOS Instructions Start -->
      <div class="app-download-item bg-white rounded shadow-lg p-4" style="border-radius: 15px; height: 100%;">
       <div class="d-flex align-items-center mb-4">
        <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: #d1fae5; border-radius: 50%; margin-right: 1rem;"><i class="fab fa-apple" style="font-size: 2rem; color: #059669;"></i>
        </div>
        <div>
         <h3 class="mb-1" style="color: #000; font-size: 1.5rem; font-weight: 700;">iOS</h3>
         <p class="mb-0" style="color: #000; font-size: 0.9rem;">For iPhone and iPad users</p>
        </div>
       </div>
       <div class="instructions">
        <div class="d-flex align-items-start mb-3 p-3" style="background: #f5f5f5; border-radius: 10px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'"><span class="d-flex align-items-center justify-content-center flex-shrink-0" style="width: 32px; height: 32px; background: #10b981; color: white; border-radius: 50%; font-weight: 700; margin-right: 1rem;">1</span>
         <p class="mb-0" style="color: #000; flex: 1;">Open <span style="font-weight: 700; color: #059669;">globalsurefinance.com</span> in Safari browser</p>
        </div>
        <div class="d-flex align-items-start mb-3 p-3" style="background: #f5f5f5; border-radius: 10px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'"><span class="d-flex align-items-center justify-content-center flex-shrink-0" style="width: 32px; height: 32px; background: #10b981; color: white; border-radius: 50%; font-weight: 700; margin-right: 1rem;">2</span>
         <p class="mb-0" style="color: #000; flex: 1;">Tap the <strong>Share</strong> icon at the bottom</p>
        </div>
        <div class="d-flex align-items-start mb-3 p-3" style="background: #f5f5f5; border-radius: 10px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'"><span class="d-flex align-items-center justify-content-center flex-shrink-0" style="width: 32px; height: 32px; background: #10b981; color: white; border-radius: 50%; font-weight: 700; margin-right: 1rem;">3</span>
         <p class="mb-0" style="color: #000; flex: 1;">Select <strong>"Add to Home Screen"</strong></p>
        </div>
        <div class="d-flex align-items-start p-3" style="background: #f5f5f5; border-radius: 10px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'"><span class="d-flex align-items-center justify-content-center flex-shrink-0" style="width: 32px; height: 32px; background: #10b981; color: white; border-radius: 50%; font-weight: 700; margin-right: 1rem;">4</span>
         <p class="mb-0" style="color: #000; flex: 1;">The app installs on your home screen instantly</p>
        </div>
       </div>
      </div><!-- iOS Instructions End -->
     </div>
    </div><!-- Additional Features -->
    <div class="row mt-5">
     <div class="col-md-4 mb-3 mb-md-0">
      <div class="text-center p-4" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border-radius: 12px;"><i class="fas fa-shield-alt text-white mb-3" style="font-size: 2.5rem;"></i>
       <h4 class="text-white mb-2" style="font-weight: 700; font-size: 1.2rem;">Secure &amp; Safe</h4>
       <p class="text-white mb-0" style="font-size: 0.95rem;">Bank-grade security for all transactions</p>
      </div>
     </div>
     <div class="col-md-4 mb-3 mb-md-0">
      <div class="text-center p-4" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border-radius: 12px;"><i class="fas fa-mobile-alt text-white mb-3" style="font-size: 2.5rem;"></i>
       <h4 class="text-white mb-2" style="font-weight: 700; font-size: 1.2rem;">Easy to Use</h4>
       <p class="text-white mb-0" style="font-size: 0.95rem;">Intuitive interface for seamless navigation</p>
      </div>
     </div>
     <div class="col-md-4">
      <div class="text-center p-4" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border-radius: 12px;"><i class="fas fa-clock text-white mb-3" style="font-size: 2.5rem;"></i>
       <h4 class="text-white mb-2" style="font-weight: 700; font-size: 1.2rem;">24/7 Access</h4>
       <p class="text-white mb-0" style="font-size: 0.95rem;">Manage your finances anytime, anywhere</p>
      </div>
     </div>
    </div>
   </div>
  </div><!-- App Download Section End -->
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9acd91e6e138bec8',t:'MTc2NTU0NjE1OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>




    <!-- About Us Section Start -->
    <div class="about-us bg-section">
      <div class="container">
        <div class="row section-row align-items-center">
          <div class="col-lg-7">
            <!-- Section Title Start -->
            <div class="section-title">
              <h3 class="wow fadeInUp">about us</h3>
              <h2 class="text-anime-style-3" data-cursor="-opaque">
                Empowering businesses and individuals with experts
              </h2>
            </div>
            <!-- Section Title End -->
          </div>

          <div class="col-lg-5">
            <!-- Section Title Content Start -->
            <div
              class="section-title-content wow fadeInUp"
              data-wow-delay="0.25s"
            >
              <p>
                We are dedicated to helping businesses and individuals navigate
                the complexities of finance with confidence and clarity. With
                years of experience in financial planning, investment
                management, business consulting.
              </p>
            </div>
            <!-- Section Title Content End -->
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <!-- About Company Item Start -->
            <div class="about-company-item wow fadeInUp">
              <div class="icon-box">
                <img src="temp/custom/assets/images/icon-about-company-1.svg" alt="" />
              </div>
              <div class="about-company-content">
                <h3>expertise you can trust</h3>
                <p>
                  Our experienced team delivers reliable insights and
                  strategies, ensuring your financial decisions are
                  well-informed and secure.
                </p>
              </div>
            </div>
            <!-- About Company Item End -->
          </div>

          <div class="col-md-4">
            <!-- About Company Item Start -->
            <div class="about-company-item wow fadeInUp" data-wow-delay="0.25s">
              <div class="icon-box">
                <img src="temp/custom/assets/images/icon-about-company-2.svg" alt="" />
              </div>
              <div class="about-company-content">
                <h3>personalized solutions</h3>
                <p>
                  Our personalized solutions are crafted address your unique
                  financial helping you achieve your specific goals and
                  aspirations.
                </p>
              </div>
            </div>
            <!-- About Company Item End -->
          </div>

          <div class="col-md-4">
            <!-- About Company Item Start -->
            <div class="about-company-item wow fadeInUp" data-wow-delay="0.5s">
              <div class="icon-box">
                <img src="temp/custom/assets/images/icon-about-company-3.svg" alt="" />
              </div>
              <div class="about-company-content">
                <h3>proven track record</h3>
                <p>
                  Our proven track record highlights successful outcomes and
                  client satisfaction through effective financial solutions.
                </p>
              </div>
            </div>
            <!-- About Company Item End -->
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <!-- About Video Image Start -->
            <div class="about-video-image bg-section">
              <!-- About Image Start -->
              <div class="about-us-video">
                <figure>
                  <video autoplay muted loop>
                    <source
                      src="temp/custom/assets/videos/leadz-video.mp4"
                      type="video/mp4"
                    />
                  </video>
                </figure>
              </div>
              <!-- About Image End -->

              <!-- About Video Btn Start -->
              <div class="about-video-btn">
                <!-- Video Play Button Start -->
                <div class="video-play-button">
                  <a
                    href="#"
                    class="popup-video"
                    data-cursor-text="<>"
                    >
                    <i class="fa fa-play"></i>
                    </a
                  >
                </div>
                <!-- Video Play Button End -->
              </div>
              <!-- About Video Btn End -->
            </div>
            <!-- About Video Image End -->
          </div>
        </div>
      </div>
    </div>
    <!-- About Us Section End -->

    <!-- Our Services Section Start -->
    <div class="our-services">
      <div class="container">
        <div class="row section-row align-items-center">
          <div class="col-lg-7">
            <!-- Section Title Start -->
            <div class="section-title">
              <h3 class="wow fadeInUp">our services</h3>
              <h2 class="text-anime-style-3" data-cursor="-opaque">
                Expert financial services for your needs
              </h2>
            </div>
            <!-- Section Title End -->
          </div>

          <div class="col-lg-5">
            <!-- Section Title Content Start -->
            <div
              class="section-title-content wow fadeInUp"
              data-wow-delay="0.25s"
            >
              <p>
                 Move funds between your accounts and schedule transfers, plus use Send Money with Zelle® to pay friends quickly, easily and for free.
                                View all your account activity and balances, pay bills automatically, set up e-mail alerts and more.
              </p>
            </div>
            <!-- Section Title Content End -->
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <!-- Services Box Start -->
            <div class="service-box wow fadeInUp">
              <!-- Services Box Header Start -->
              <div class="service-box-header">
                <!-- Services Box Tag Start -->
                <div class="service-box-tag">
                  <a href="#">financial planning</a>
                </div>
                <!-- Services Box Tag End -->

                <!-- Services Box Title Start -->
                <div class="service-box-title">
                  <h3>Strategic Business Consulting for Growth Success</h3>
                </div>
                <!-- Services Box Title End -->
              </div>
              <!-- Services Box Header End -->

              <!-- Services Box Image Start -->
              <div class="service-box-image">
                <img src="temp/custom/assets/images/service-box-image-1.png" alt="" />
              </div>
              <!-- Services Box Image End -->
            </div>
            <!-- Services Box End -->
          </div>

          <div class="col-lg-4 col-md-6">
            <!-- Services Box Start -->
            <div class="service-box wow fadeInUp" data-wow-delay="0.25s">
              <!-- Services Box Header Start -->
              <div class="service-box-header">
                <!-- Services Box Tag Start -->
                <div class="service-box-tag">
                  <a href="#">business consulting</a>
                </div>
                <!-- Services Box Tag End -->

                <!-- Services Box Title Start -->
                <div class="service-box-title">
                  <h3>Comprehensive Financial Planning for Your Future</h3>
                </div>
                <!-- Services Box Title End -->
              </div>
              <!-- Services Box Header End -->

              <!-- Services Box Image Start -->
              <div class="service-box-image">
                <img src="temp/custom/assets/images/service-box-image-2.png" alt="" />
              </div>
              <!-- Services Box Image End -->
            </div>
            <!-- Services Box End -->
          </div>

          <div class="col-lg-4 col-md-6">
            <!-- Services Box Start -->
            <div class="service-box wow fadeInUp" data-wow-delay="0.5s">
              <!-- Services Box Header Start -->
              <div class="service-box-header">
                <!-- Services Box Tag Start -->
                <div class="service-box-tag">
                  <a href="#">Want to own your own home?</a>
                </div>
                <!-- Services Box Tag End -->

                <!-- Services Box Title Start -->
                <div class="service-box-title">
                  <h3>Check Out Our Morgage Plan</h3>
                </div>
                <!-- Services Box Title End -->
              </div>
              <!-- Services Box Header End -->

              <!-- Services Box Image Start -->
              <div class="service-box-image">
                <img src="temp/custom/assets/images/service-box-image-3.png" alt="" />
              </div>
              <!-- Services Box Image End -->
            </div>
            <!-- Services Box End -->
          </div>
        </div>
      </div>
    </div>
    <!-- Our Services Section End -->

    <!-- Our Expertise Section Start -->
    <div class="our-expertise bg-section">
      <div class="container">
        <div class="row section-row align-items-center">
          <div class="col-lg-7">
            <!-- Section Title Start -->
            <div class="section-title">
              <h3 class="wow fadeInUp">our expertise</h3>
              <h2 class="text-anime-style-3" data-cursor="-opaque">
                Driving innovation and success in Industry Insights
              </h2>
            </div>
            <!-- Section Title End -->
          </div>

          <div class="col-lg-5">
            <!-- Section Title Content Start -->
            <div
              class="section-title-content wow fadeInUp"
              data-wow-delay="0.25s"
            >
              <p>
                 {{$settings->site_name}} Savings Invent is our enterprise approach to innovation and supports our business strategy as a forward-focused bank.
                 It's about using emerging technology to engage with our customers and exceeding their rapidly evolving expectations.
              </p>
            </div>
            <!-- Section Title Content End -->
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <!-- Sidebar Our Expertise Nav start -->
            <div class="our-tab-nav wow fadeInUp" data-wow-delay="0.25s">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link btn-highlighted active"
                    id="financial-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#financial"
                    type="button"
                    role="tab"
                    aria-selected="true"
                  >
                    Financial Planning
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link btn-highlighted"
                    id="business-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#business"
                    type="button"
                    role="tab"
                    aria-selected="false"
                  >
                    Business Consulting
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link btn-highlighted"
                    id="risk-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#risk"
                    type="button"
                    role="tab"
                    aria-selected="false"
                  >
                    Risk Management
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link btn-highlighted"
                    id="investment-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#investment"
                    type="button"
                    role="tab"
                    aria-selected="false"
                  >
                    Investment Management
                  </button>
                </li>
              </ul>
            </div>
            <!-- Sidebar Our Expertise Nav End -->

            <!-- Expertise Box Start -->
            <div class="expertise-box tab-content" id="myTabContent">
              <!-- Expertise Item Start -->
              <div
                class="expertise-item tab-pane fade show active"
                id="financial"
                role="tabpanel"
              >
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <!-- Expertise Content Start -->
                    <div class="expertise-content">
                      <!-- Expertise Content Header Start -->
                      <div class="expertise-content-header">
                        <h3>Benefits of our financial:</h3>
                        <p>
                          Empower your financial journey with expert advice,
                          personalized strategies, and solutions designed to
                          help you achieve long-term stability, growth, and
                          peace of mind.
                        </p>
                      </div>
                      <!-- Expertise Content Header End -->

                      <!-- Expertise Content Body Start -->
                      <div class="expertise-content-body">
                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-1.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>expert nvestment management</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->

                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-2.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>Social Security and Pension Optimization</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->

                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-3.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>business financial planning</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->
                      </div>
                      <!-- Expertise Content Body End -->

                      <!-- Expertise Button Start -->
                      <div class="expertise-btn">
                        <a href="contact" class="btn-default">contact now</a>
                      </div>
                      <!-- Expertise Button End -->
                    </div>
                    <!-- Expertise Content End -->
                  </div>

                  <div class="col-lg-6">
                    <!-- Expertise Image Start -->
                    <div class="expertise-image">
                      <figure class="image-anime">
                        <img src="temp/custom/assets/images/expertise-financial-img.jpg" alt="" />
                      </figure>
                    </div>
                    <!-- Expertise Image End -->
                  </div>
                </div>
              </div>
              <!-- Expertise Item End -->

              <!-- Expertise Item Start -->
              <div
                class="expertise-item tab-pane fade"
                id="business"
                role="tabpanel"
              >
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <!-- Expertise Content Start -->
                    <div class="expertise-content">
                      <!-- Expertise Content Header Start -->
                      <div class="expertise-content-header">
                        <h3>Benefits of our business:</h3>
                        <p>
                          Empower your business journey with expert advice,
                          personalized strategies, and solutions designed to
                          help you achieve long-term stability, growth, and
                          peace of mind.
                        </p>
                      </div>
                      <!-- Expertise Content Header End -->

                      <!-- Expertise Content Body Start -->
                      <div class="expertise-content-body">
                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-1.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>expert nvestment management</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->

                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-2.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>Social Security and Pension Optimization</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->

                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-3.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>business financial planning</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->
                      </div>
                      <!-- Expertise Content Body End -->

                      <!-- Expertise Button Start -->
                      <div class="expertise-btn">
                        <a href="#" class="btn-default">contact now</a>
                      </div>
                      <!-- Expertise Button End -->
                    </div>
                    <!-- Expertise Content End -->
                  </div>

                  <div class="col-lg-6">
                    <!-- Expertise Image Start -->
                    <div class="expertise-image">
                      <figure class="image-anime">
                        <img src="temp/custom/assets/images/expertise-financial-img.jpg" alt="" />
                      </figure>
                    </div>
                    <!-- Expertise Image End -->
                  </div>
                </div>
              </div>
              <!-- Expertise Item End -->

              <!-- Expertise Item Start -->
              <div
                class="expertise-item tab-pane fade"
                id="risk"
                role="tabpanel"
              >
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <!-- Expertise Content Start -->
                    <div class="expertise-content">
                      <!-- Expertise Content Header Start -->
                      <div class="expertise-content-header">
                        <h3>Benefits of our risk:</h3>
                        <p>
                          Empower your risk journey with expert advice,
                          personalized strategies, and solutions designed to
                          help you achieve long-term stability, growth, and
                          peace of mind.
                        </p>
                      </div>
                      <!-- Expertise Content Header End -->

                      <!-- Expertise Content Body Start -->
                      <div class="expertise-content-body">
                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-1.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>expert nvestment management</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->

                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-2.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>Social Security and Pension Optimization</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->

                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-3.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>business financial planning</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->
                      </div>
                      <!-- Expertise Content Body End -->

                      <!-- Expertise Button Start -->
                      <div class="expertise-btn">
                        <a href="#" class="btn-default">contact now</a>
                      </div>
                      <!-- Expertise Button End -->
                    </div>
                    <!-- Expertise Content End -->
                  </div>

                  <div class="col-lg-6">
                    <!-- Expertise Image Start -->
                    <div class="expertise-image">
                      <figure class="image-anime">
                        <img src="temp/custom/assets/images/expertise-financial-img.jpg" alt="" />
                      </figure>
                    </div>
                    <!-- Expertise Image End -->
                  </div>
                </div>
              </div>
              <!-- Expertise Item End -->

              <!-- Expertise Item Start -->
              <div
                class="expertise-item tab-pane fade"
                id="investment"
                role="tabpanel"
              >
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <!-- Expertise Content Start -->
                    <div class="expertise-content">
                      <!-- Expertise Content Header Start -->
                      <div class="expertise-content-header">
                        <h3>Benefits of our investment:</h3>
                        <p>
                          Empower your investment journey with expert advice,
                          personalized strategies, and solutions designed to
                          help you achieve long-term stability, growth, and
                          peace of mind.
                        </p>
                      </div>
                      <!-- Expertise Content Header End -->

                      <!-- Expertise Content Body Start -->
                      <div class="expertise-content-body">
                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-1.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>expert nvestment management</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->

                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-2.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>Social Security and Pension Optimization</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->

                        <!-- Expertise List Item Start -->
                        <div class="expertise-list-item">
                          <div class="icon-box">
                            <img
                              src="temp/custom/assets/images/icon-expertise-list-3.svg"
                              alt=""
                            />
                          </div>
                          <div class="expertise-list-content">
                            <p>business financial planning</p>
                          </div>
                        </div>
                        <!-- Expertise List Item End -->
                      </div>
                      <!-- Expertise Content Body End -->

                      <!-- Expertise Button Start -->
                      <div class="expertise-btn">
                        <a href="#" class="btn-default">contact now</a>
                      </div>
                      <!-- Expertise Button End -->
                    </div>
                    <!-- Expertise Content End -->
                  </div>

                  <div class="col-lg-6">
                    <!-- Expertise Image Start -->
                    <div class="expertise-image">
                      <figure class="image-anime">
                        <img src="temp/custom/assets/images/expertise-financial-img.jpg" alt="" />
                      </figure>
                    </div>
                    <!-- Expertise Image End -->
                  </div>
                </div>
              </div>
              <!-- Expertise Item End -->
            </div>
            <!-- Expertise Box End -->
          </div>
        </div>
      </div>
    </div>
    <!-- Our Expertise Section End -->

    <!-- Why Choose Us Secton Start -->
    <div class="why-choose-us">
      <div class="container">
        <div class="row section-row align-items-center">
          <div class="col-lg-7">
            <!-- Section Title Start -->
            <div class="section-title">
              <h3 class="wow fadeInUp">why choose us</h3>
              <h2 class="text-anime-style-3" data-cursor="-opaque">
                Expertise and client focused solutions for your success
              </h2>
            </div>
            <!-- Section Title End -->
          </div>

          <div class="col-lg-5">
            <!-- Section Title Content Start -->
            <div
              class="section-title-content wow fadeInUp"
              data-wow-delay="0.25s"
            >
              <p>
                Our team of experienced professionals delivers personalized,
                results-driven financial strategies tailored to your unique
                goals. We prioritize transparency, trust, and long-term success.
              </p>
            </div>
            <!-- Section Title Content End -->
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <!-- Why Choose Item Start -->
            <div class="why-choose-item wow fadeInUp">
              <!-- Why Choose Image Start -->
              <div class="why-choose-image">
                <figure>
                  <img src="temp/custom/assets/images/why-choose-image-1.jpg" alt="" />
                </figure>
              </div>
              <!-- Why Choose Image End -->

              <!-- Why Choose Number Start -->
              <div class="why-choose-no">
                <h3>01</h3>
              </div>
              <!-- Why Choose Number End -->

              <!-- Why Choose Body Start -->
              <div class="why-choose-body">
                <!-- Why Choose Content Start -->
                <div class="why-choose-content">
                  <h3>unparalleled expertise</h3>
                  <p>
                    Our team comprises seasoned professionals with extensive.
                  </p>
                </div>
                <!-- Why Choose Content End -->

                <div class="why-choose-btn">
                  <a href="#" class="readmore-btn"
                    ><img src="temp/custom/assets/images/icon-arrow.svg" alt=""
                  /></a>
                </div>
              </div>
              <!-- Why Choose Body End -->
            </div>
            <!-- Why Choose Item End -->
          </div>

          <div class="col-lg-4 col-md-6">
            <!-- Why Choose Item Start -->
            <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s">
              <!-- Why Choose Image Start -->
              <div class="why-choose-image">
                <figure>
                  <img src="temp/custom/assets/images/why-choose-image-2.jpg" alt="" />
                </figure>
              </div>
              <!-- Why Choose Image End -->

              <!-- Why Choose Number Start -->
              <div class="why-choose-no">
                <h3>02</h3>
              </div>
              <!-- Why Choose Number End -->

              <!-- Why Choose Body Start -->
              <div class="why-choose-body">
                <!-- Why Choose Content Start -->
                <div class="why-choose-content">
                  <h3>cash flow optimization</h3>
                  <p>
                    Improve cash flow through structured savings, budgeting
                    techniques
                  </p>
                </div>
                <!-- Why Choose Content End -->

                <div class="why-choose-btn">
                  <a href="#" class="readmore-btn"
                    ><img src="temp/custom/assets/images/icon-arrow.svg" alt=""
                  /></a>
                </div>
              </div>
              <!-- Why Choose Body End -->
            </div>
            <!-- Why Choose Item End -->
          </div>

          <div class="col-lg-4 col-md-6">
            <!-- Why Choose Item Start -->
            <div class="why-choose-item wow fadeInUp" data-wow-delay="0.5s">
              <!-- Why Choose Image Start -->
              <div class="why-choose-image">
                <figure>
                  <img src="temp/custom/assets/images/why-choose-image-3.jpg" alt="" />
                </figure>
              </div>
              <!-- Why Choose Image End -->

              <!-- Why Choose Number Start -->
              <div class="why-choose-no">
                <h3>03</h3>
              </div>
              <!-- Why Choose Number End -->

              <!-- Why Choose Body Start -->
              <div class="why-choose-body">
                <!-- Why Choose Content Start -->
                <div class="why-choose-content">
                  <h3>financial accountability</h3>
                  <p>
                    Stay on track with your financial goals through regular
                    check-ins
                  </p>
                </div>
                <!-- Why Choose Content End -->

                <div class="why-choose-btn">
                  <a href="#" class="readmore-btn"
                    ><img src="temp/custom/assets/images/icon-arrow.svg" alt=""
                  /></a>
                </div>
              </div>
              <!-- Why Choose Body End -->
            </div>
            <!-- Why Choose Item End -->
          </div>
        </div>
      </div>
    </div>
    <!-- Why Choose Us Secton End -->

    <!-- Our Approach Section Start -->
    <div class="our-approach bg-section">
      <div class="container">
        <div class="row section-row align-items-center">
          <div class="col-lg-7">
            <!-- Section Title Start -->
            <div class="section-title">
              <h3 class="wow fadeInUp">our approach</h3>
              <h2 class="text-anime-style-3" data-cursor="-opaque">
                Client centric strategy for lasting success
              </h2>
            </div>
            <!-- Section Title End -->
          </div>

          <div class="col-lg-5">
            <!-- Section Title Content Start -->
            <div
              class="section-title-content wow fadeInUp"
              data-wow-delay="0.25s"
            >
              <p>
                We believe that a successful financial journey starts with
                understanding your unique needs and aspirations Our approach is
                built on a foundation of collaboration, transparency, and
                expertise.
              </p>
            </div>
            <!-- Section Title Content End -->
          </div>
        </div>

        <div class="row align-items-end">
          <div class="col-lg-3 col-md-6">
            <!-- Approach item Start -->
            <div class="approach-item approach-box-1 wow fadeInUp">
              <!-- Approach Btn Start -->
              <div class="approach-btn">
                <a href="#" class="readmore-btn"
                  ><img src="temp/custom/assets/images/icon-arrow.svg" alt=""
                /></a>
              </div>
              <!-- Approach Btn End -->

              <!-- Approach Image Start -->
              <div class="approach-image">
                <img src="temp/custom/assets/images/approach-image-1.png" alt="" />
              </div>
              <!-- Approach Image End -->

              <!-- Approach Body Start -->
              <div class="approach-body">
                <!-- Approach Tags Start -->
                <div class="approach-tags">
                  <a href="#">focus</a>
                </div>
                <!-- Approach Tags End -->

                <!-- Approach Content Start -->
                <div class="approach-content">
                  <h3>Get the real exchange rate </h3>
                  <p>
                    We don’t charge fees for spending on your card abroad,
                    and we pass Mastercard's exchange ratedirectly onto you, without extra charges.
                  </p>
                </div>
                <!-- Approach Content End -->
              </div>
              <!-- Approach Body End -->
            </div>
            <!-- Approach item End -->
          </div>

          <div class="col-lg-3 col-md-6">
            <!-- Approach item Start -->
            <div
              class="approach-item approach-box-2 wow fadeInUp"
              data-wow-delay="0.25s"
            >
              <!-- Approach Content Start -->
              <div class="approach-content">
                <h3>
                  We craft customized financial strategies that align with your
                  objectives.
                </h3>
              </div>
              <!-- Approach Content End -->

              <!-- Approach Image Start -->
              <div class="approach-image">
                <img src="temp/custom/assets/images/approach-image-2.png" alt="" />
              </div>
              <!-- Approach Image End -->
            </div>
            <!-- Approach item End -->
          </div>

          <div class="col-lg-3 col-md-6">
            <!-- Approach item Start -->
            <div
              class="approach-item approach-box-3 wow fadeInUp"
              data-wow-delay="0.5s"
            >
              <div class="approach-header">
                <!-- Approach Body Start -->
                <div class="approach-body">
                  <!-- Approach Content Start -->
                  <div class="approach-content">
                    <p>Stay on the KNOW</p>
                    <h3>Eroll for Online Banking</h3>
                  </div>
                  <!-- Approach Content End -->

                  <!-- Approach Tags Start -->
                  <div class="approach-tags">
                    <a href="#">100%</a> Secured
                  </div>
                  <!-- Approach Tags End -->
                </div>
                <!-- Approach Body End -->

                <!-- Approach Btn Start -->
                <div class="approach-btn">
                  <a href="#" class="readmore-btn"
                    ><img src="temp/custom/assets/images/icon-arrow.svg" alt=""
                  /></a>
                </div>
                <!-- Approach Btn End -->
              </div>

              <!-- Approach Image Start -->
              <div class="approach-image">
                <img src="temp/custom/assets/images/approach-image-3.png" alt="" />
              </div>
              <!-- Approach Image End -->
            </div>
            <!-- Approach item End -->
          </div>

          <div class="col-lg-3 col-md-6">
            <!-- Approach item Start -->
            <div
              class="approach-item approach-box-4 wow fadeInUp"
              data-wow-delay="0.75s"
            >
              <!-- Approach Btn Start -->
              <div class="approach-btn">
                <a href="#" class="readmore-btn"
                  ><img src="temp/custom/assets/images/icon-arrow.svg" alt=""
                /></a>
              </div>
              <!-- Approach Btn End -->

              <!-- Approach Image Start -->
              <div class="approach-image">
                <img src="temp/custom/assets/images/approach-image-4.png" alt="" />
              </div>
              <!-- Approach Image End -->

              <!-- Approach Body Start -->
              <div class="approach-body">
                <!-- Approach Content Start -->
                <div class="approach-content">
                  <h3>
                    You gain a trusted partner committed to your financial
                    well-being
                  </h3>
                </div>
                <!-- Approach Content End -->
              </div>
              <!-- Approach Body End -->
            </div>
            <!-- Approach item End -->
          </div>
        </div>
      </div>
    </div>
    <!-- Our Approach Section End -->

    <!-- Company Wisdom Section Start -->
    <div class="company-wisdom">
      <div class="container">
        <div class="row section-row align-items-center">
          <div class="col-lg-7">
            <!-- Section Title Start -->
            <div class="section-title">
              <h3 class="wow fadeInUp">financial wisdom</h3>
              <h2 class="text-anime-style-3" data-cursor="-opaque">
                Fascinating facts that shape your financial knowledge
              </h2>
            </div>
            <!-- Section Title End -->
          </div>

          <div class="col-lg-5">
            <!-- Section Title Content Start -->
            <div
              class="section-title-content wow fadeInUp"
              data-wow-delay="0.25s"
            >
              <p>
                Explore fun and surprising facts about the financial world.
                Learn how history, trends, and innovations have shaped today's
                finance landscape, making it easier to navigate your financial
                journey.
              </p>
            </div>
            <!-- Section Title Content End -->
          </div>
        </div>

        <div class="row">
          <div class="company-wisdom-box">
            <!-- Company Wisdom Image Start -->
            <div class="company-wisdom-image">
              <figure class="image-anime reveal">
                <img src="temp/custom/assets/images/company-wisdom-img-1.jpg" alt="" />
              </figure>
            </div>
            <!-- Company Wisdom Image End -->

            <!-- Company Wisdom Item Start -->
            <div class="company-wisdom-item">
              <!-- Company Counter Title Start -->
              <div class="company-counter-title">
                <h3>The number of publicly traded companies</h3>
              </div>
              <!-- Company Counter Title End -->

              <!-- Company Counter Counter Start -->
              <div class="company-wisdom-counter">
                <h2><span class="counter">12</span>k+</h2>
              </div>
              <!-- Company Counter Counter End -->
            </div>
            <!-- Company Wisdom Item End -->

            <!-- Company Wisdom Image Start -->
            <div class="company-wisdom-image">
              <figure class="image-anime reveal">
                <img src="temp/custom/assets/images/company-wisdom-img-2.jpg" alt="" />
              </figure>
            </div>
            <!-- Company Wisdom Image End -->

            <!-- Company Wisdom Item Start -->
            <div class="company-wisdom-item">
              <!-- Company Counter Title Start -->
              <div class="company-counter-title">
                <h3>The percentage of financial advisors</h3>
              </div>
              <!-- Company Counter Title End -->

              <!-- Company Counter Counter Start -->
              <div class="company-wisdom-counter">
                <h2><span class="counter">80</span>%</h2>
              </div>
              <!-- Company Counter Counter End -->
            </div>
            <!-- Company Wisdom Item End -->

            <!-- Company Wisdom Item Start -->
            <div class="company-wisdom-item">
              <!-- Company Counter Title Start -->
              <div class="company-counter-title">
                <h3>The number of credit cards in circulation</h3>
              </div>
              <!-- Company Counter Title End -->

              <!-- Company Counter Counter Start -->
              <div class="company-wisdom-counter">
                <h2><span class="counter">31</span>k+</h2>
              </div>
              <!-- Company Counter Counter End -->
            </div>
            <!-- Company Wisdom Item End -->

            <!-- Company Wisdom Image Start -->
            <div class="company-wisdom-image">
              <figure class="image-anime reveal">
                <img src="temp/custom/assets/images/company-wisdom-img-3.jpg" alt="" />
              </figure>
            </div>
            <!-- Company Wisdom Image End -->

            <!-- Company Wisdom Item Start -->
            <div class="company-wisdom-item">
              <!-- Company Counter Title Start -->
              <div class="company-counter-title">
                <h3>
                  The proportion of Americans who believe that financial
                  literacy
                </h3>
              </div>
              <!-- Company Counter Title End -->

              <!-- Company Counter Counter Start -->
              <div class="company-wisdom-counter">
                <h2><span class="counter">90</span>%</h2>
              </div>
              <!-- Company Counter Counter End -->
            </div>
            <!-- Company Wisdom Item End -->

            <!-- Company Wisdom Image Start -->
            <div class="company-wisdom-image">
              <figure class="image-anime reveal">
                <img src="temp/custom/assets/images/company-wisdom-img-4.jpg" alt="" />
              </figure>
            </div>
            <!-- Company Wisdom Image End -->
          </div>
        </div>
      </div>
    </div>
    <!-- Company Wisdom Section End -->



    <!-- CTA Box Start -->
    <div class="cta-box bg-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 order-lg-1 order-2">
            <!-- CTA Box Image Start -->
            <div class="cta-box-image">
              <figure>
                <img src="temp/custom/assets/images/cta-box-image.jpg" alt="" />
              </figure>
            </div>
            <!-- CTA Box Image End -->
          </div>

          <div class="col-lg-7 order-lg-2 order-1">
            <!-- CTA Box Content Start -->
            <div class="cta-box-content">
              <!-- Section Title Start -->
              <div class="section-title">
                <h3 class="wow fadeInUp">FDIC-Insured - Backed by the full faith and credit of the U.S. Government</h3>
                <h2 class="text-anime-style-3" data-cursor="-opaque">
                  Take control of your financial future today!
                </h2>
                <p class="wow fadeInUp" data-wow-delay="0.25s">
                  We’ve made it easy for GreenTop Bank employees to harness their creativity,
                  bring their ideas to life, and solve customer and colleague problems.
                </p>
              </div>
              <!-- Section Title End -->

              <!-- CTA Box Button Start -->
              <div class="cta-box-btn wow fadeInUp" data-wow-delay="0.5s">
                <a href="register" class="btn-highlighted btn-cta-1"
                  >get started today</a
                >
                <a href="about" class="btn-highlighted btn-cta-2"
                  >explore our services</a
                >
              </div>
              <!-- CTA Box Button End -->
            </div>
            <!-- CTA Box Content End -->
          </div>
        </div>
      </div>
    </div>
    <!-- CTA Box End -->

    <!-- Our FAQs Section Start -->
    <div class="our-faqs bg-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">

          </div>
        </div>

        <div class="row section-row align-items-center">
          <div class="col-lg-7">
            <!-- Section Title Start -->
            <div class="section-title">
              <h3 class="wow fadeInUp">frequently asked questions</h3>
              <h2 class="text-anime-style-3" data-cursor="-opaque">
                Common business & finance questions and answers
              </h2>
            </div>
            <!-- Section Title End -->
          </div>

          <div class="col-lg-5">
            <!-- Section Button Start -->
            <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
              <a href="contact" class="btn-default">contact now</a>
            </div>
            <!-- Section Button End -->
          </div>
        </div>
        <div class="row">
    <div class="col-lg-12">
    <!-- Our FAQs Box Start -->
    <div class="our-faqs-box">
        <!-- FAQs Item Start -->
        <div class="faqs-item wow fadeInUp">
        <!-- FAQs Item Content Start -->
        <div class="faqs-item-content">
            <h3>How do I register for mobile banking at {{$settings->site_name}} ?</h3>
            <p>
            <li>If you are enrolled in Online Banking, simply use your user name and password to log in to your accounts through the {{$settings->site_name}} Savings app.</li>
            <li>After logging in, Android® and iPhone®</li>
            <li>users may also enroll in the {{$settings->site_name}} Savings Mobile Deposit service to deposit checks using the mobile app.</li>
            <li>To enroll, select Mobile Deposit from the Main Menu, then review and accept the
                If you are not currently registered for Online Banking, <a href="register">sign up</a> online.</li>
            </p>
        </div>
        <!-- FAQs Item Content End -->
        </div>
        <!-- FAQs Item End -->

        <!-- FAQs Item Start -->
        <div class="faqs-item wow fadeInUp" data-wow-delay="0.2s">
        <!-- FAQs Item Content Start -->
        <div class="faqs-item-content">
            <h3>What is Mobile Deposit?</h3>
            <p>
                Our Mobile Deposit allows you to deposit a check through the {{$settings->site_name}} Savings                                            mobile app using your internet-enabled iPhone® or Android™ mobile device,
                provided your device has a camera. You must be an Online or Mobile banking
                customer, and enrolled in the {{$settings->site_name}} Savings Mobile Deposit service.
                In the {{$settings->site_name}} Savings mobile app, select "Mobile Deposit," then follow
                the steps to enroll or deposit a check.
            </p>
        </div>
        <!-- FAQs Item Content End -->
        </div>
        <!-- FAQs Item End -->
    </div>
    <!-- Our FAQs Box End -->
    </div>
</div>      </div>
    </div>
    <!-- Our FAQs Section End -->




@endsection
