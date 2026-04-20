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
@inject('content', 'App\Http\Controllers\FrontController')
@section('title', 'Cooperate Banking')


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
                              <small> Maximize your wealth with tailored strategies and expert guidance. We provide comprehensive financial solutions designed to
                                help individuals and businesses thrive in today's dynamic marketplace.
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

    <!-- Our Expertise Section Start -->
    <div class="our-expertise mt-5">
      <div class="container">
        <div class="row section-row align-items-center">
          <div class="col-lg-7">
            <!-- Section Title Start -->
            <div class="section-title">
              <h3 class="wow fadeInUp">Grow your business with us</h3>
              <h2 class="text-anime-style-3" data-cursor="-opaque">
                With Banking Solutions Designed to Increase the productivity and growth, together we will make your business vision a reality.
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
              <div class="row">
                <div class="col-12">
                    <p>
                      Join the thousands of businesses that value our people-people approach to
                      business banking. Whether you’re a small business, large corporation or
                      somewhere in between, you can trust our #1 rated in-store service to meet your business banking needs.
                    </p>
                </div>
                <hr>
                <div class="col-lg-7">
                    <p>
                      At Sefton International Bank we are committed to the development of the real sectors of the
                      economy. Banking made easier by caring for your needs, We offer a comprehensive portfolio of corporate and commercial banking services in the Energy, Manufacturing, FMCGs, Export & Import,
                      amongst others.
                    </p>
                </div>
                <div class="col-lg-5 border rounded p-3">
                  <div class="company-wisdom-item">
                      <!-- Company Counter Title Start -->
                      <div class="company-counter-title">
                        <h3>Join</h3>
                      </div>
                      <!-- Company Counter Title End -->

                      <!-- Company Counter Counter Start -->
                      <p class="company-wisdom-counter">
                        <h2 class="text-success"><span class="counter">912</span>k+</h2>
                        <p>Other Businesses</p>
                      </div>
                      <!-- Company Counter Counter End -->
                    </div>
                </div>
              </div>

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
                    Economy Checking
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
                    NOW Checking
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
                    Special SSB Account
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
                        <h3>Economy Checking:</h3>
                        <p>
                          This is your essential checking account and is perfect for managing everyday finances..
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
                            <p>Opening balance $100</p>
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
                            <p>Maintenance fee $0</p>
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
                            <p>Minimum balance required $0</p>
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
                        <h3>Benefits of NOW Checking:</h3>
                        <p>
                          This account lets you earn interest
                          while enjoying all of the benefits you come to expect from a great checking account.
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
                            <p>Opening balance $1,000</p>
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
                            <p>Monthly maintenance fee $15</p>
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
                            <p>Minimum balance required to avoid a fee $1,000</p>
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
                          This interest checking account can be very rewarding and offers a starter box of checks.
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
                            <p>Opening balance $2,000</p>
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
                            <p>Monthly maintenance fee $25</p>
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
                            <p>Minimum balance required to avoid a fee $2,000</p>
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
                          This is an interest account and offers check writing capabilities
                          and your essential savings account that is
                          important to save for any emergency situation or for a special purchase someday.
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
                            <p>expert investment management</p>
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
                        <a href="register" class="btn-default">New Account Enrolment</a>
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
