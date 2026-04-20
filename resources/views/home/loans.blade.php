@php
    if ($settings->redirect_url != null or !empty($settings->redirect_url)) {
        header("Location: $settings->redirect_url", true, 301);
        exit();
    }
@endphp
@extends('layouts.base')
@inject('content', 'App\Http\Controllers\FrontController')
@section('title', 'About Us')


@section('content')


    <!-- Hero Section Start -->
    <div class="hero hero-image hero-video mb-2 p-0">
        <!-- Video Start -->
        <div class="hero-bg-video">
            <video autoplay muted loop id="myVideo"><source src="temp/custom/assets/videos/business-banking.mp4" type="video/mp4"></video>
        </div>
        <!-- Video End -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mt-5">
                    <!-- Hero Content Start -->
                    <div class="hero-content ">
                        <!-- Section Title Start -->
                        <div class="section-title mt-5">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Business banking made easy</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                              <small>
                                Sefton International Bank has been supporting the businesses in our communities for almost 30 years with a wide range of loans.
                                Our dedicated lending staff and quick turnaround times will help you achieve your short and long-term goals.
                              </small>
                            </p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Hero Content Btn Start -->
                        <div class="hero-content-btn">
                            <a href="register" class="btn-default">Enrol</a>
                        </div>
                        <!-- Hero Content Btn End -->
                    </div>
                    <!-- Hero Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <div class="page-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp">
                        <!-- Service Image Start -->
                        <div class="service-image">
                            <a href="#">
                                <figure class="image-anime">
                                    <img src="temp/custom/assets/images/loans/business-loan.webp" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Service Image End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <!-- Service Content Start -->
                            <div class="service-content">
                                <h3>Business Loans</h3>
                                <p>
                                  We use soft credit searching when you apply for a loan with us,
                                  this doesn’t leave a negative mark on your credit file if you are unsuccessful.
                                </p>
                            </div>
                            <!-- Service Content End -->

                            <!-- Service Button Start -->
                            <div class="service-btn">
                                <a href="login" class="readmore-btn"><img src="temp/custom/assets/images/icon-arrow.svg" alt=""></a>
                            </div>
                            <!-- Service Button End -->
                        </div>
                        <!-- Service Body End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Service Image Start -->
                        <div class="service-image">
                            <figure>
                                <img src="temp/custom/assets/images/loans/car-loans.jpg" alt="">
                            </figure>
                        </div>
                        <!-- Service Image End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <!-- Service Content Start -->
                            <div class="service-content">
                                <h3>Car Loans</h3>
                                <p>Do you need help getting back on the road? We might be able to help.</p>
                            </div>
                            <!-- Service Content End -->

                            <!-- Service Button Start -->
                            <div class="service-btn">
                                <a href="login" class="readmore-btn"><img src="temp/custom/assets/images/icon-arrow.svg" alt=""></a>
                            </div>
                            <!-- Service Button End -->
                        </div>
                        <!-- Service Body End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Service Image Start -->
                        <div class="service-image">
                            <figure>
                                <img src="temp/custom/assets/images/loans/debt-consolidation.jpg" alt="">
                            </figure>
                        </div>
                        <!-- Service Image End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <!-- Service Content Start -->
                            <div class="service-content">
                                <h3>Debt Consolidation</h3>
                                <p>
                                  Consolidating your debts can make keeping on top of your monthly payments much simpler. Even if you’ve had bad credit in the past,
                                  you can apply for a loan with us to see if we can help you.
                                </p>
                            </div>
                            <!-- Service Content End -->

                            <!-- Service Button Start -->
                            <div class="service-btn">
                                <a href="login" class="readmore-btn"><img src="temp/custom/assets/images/icon-arrow.svg" alt=""></a>
                            </div>
                            <!-- Service Button End -->
                        </div>
                        <!-- Service Body End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.6s">
                        <!-- Service Image Start -->
                        <div class="service-image">
                            <figure>
                                <img src="temp/custom/assets/images/loans/home-improvement.jpg" alt="">
                            </figure>
                        </div>
                        <!-- Service Image End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <!-- Service Content Start -->
                            <div class="service-content">
                                <h3>Home Improvement</h3>
                                <p>
                                  If you are looking to finance improvements to your home, apply with us today.
                                  Even if you have struggled with bad credit, we may be able to help.
                                </p>
                            </div>
                            <!-- Service Content End -->

                            <!-- Service Button Start -->
                            <div class="service-btn">
                                <a href="login" class="readmore-btn"><img src="temp/custom/assets/images/icon-arrow.svg" alt=""></a>
                            </div>
                            <!-- Service Button End -->
                        </div>
                        <!-- Service Body End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.8s">
                        <!-- Service Image Start -->
                        <div class="service-image">
                            <figure>
                                <img src="temp/custom/assets/images/loans/bad-credit.webp" alt="">
                            </figure>
                        </div>
                        <!-- Service Image End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <!-- Service Content Start -->
                            <div class="service-content">
                                <h3>Bad Credit</h3>
                                <p>
                                  A few bumps in your credit history, such as missed repayments on credit cards, personal loans, or mortgages or even just a lack of general credit history,
                                  can make it harder to obtain loans and other credit facilities.
                                </p>
                            </div>
                            <!-- Service Content End -->

                            <!-- Service Button Start -->
                            <div class="service-btn">
                                <a href="login" class="readmore-btn"><img src="temp/custom/assets/images/icon-arrow.svg" alt=""></a>
                            </div>
                            <!-- Service Button End -->
                        </div>
                        <!-- Service Body End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="1s">
                        <!-- Service Image Start -->
                        <div class="service-image">
                            <figure>
                                <img src="temp/custom/assets/images/service-img-6.jpg" alt="">
                            </figure>
                        </div>
                        <!-- Service Image End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <!-- Service Content Start -->
                            <div class="service-content">
                                <h3>Long Term Loan</h3>
                                <p>
                                  We are a direct lender specialising in helping those with less-than-perfect credit. You could
                                  borrow up to $15,000 from 18 months to 5 years. Contact us to see if we can help.
                                </p>
                            </div>
                            <!-- Service Content End -->

                            <!-- Service Button Start -->
                            <div class="service-btn">
                                <a href="login" class="readmore-btn"><img src="temp/custom/assets/images/icon-arrow.svg" alt=""></a>
                            </div>
                            <!-- Service Button End -->
                        </div>
                        <!-- Service Body End -->
                    </div>
                    <!-- Service Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Services End -->




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
                  Free banking on everyday transactions for 2 years
                </h2>
                <p class="wow fadeInUp" data-wow-delay="0.25s">
                  When you open a Start-up or switch to GreenTop Bank business banking. Other fees may apply.
                  Eligibility criteria, terms and conditions apply.
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

    </div>
    <!-- Our FAQs Section End -->


@endsection
