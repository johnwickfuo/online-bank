@extends('layouts.base')
@section('title', 'Home')


@section('content')

    <!-- Hero Section Start -->
    <div class="hero hero-image hero-video mb-2 p-0">
        <!-- Video Start -->
        <div class="hero-bg-video">
            <video autoplay muted loop id="myVideo"><source src="temp/custom/assets/videos/hero.mp4" type="video/mp4"></video>
        </div>
        <!-- Video End -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mt-5">
                    <!-- Hero Content Start -->
                    <div class="hero-content ">
                        <!-- Section Title Start -->
                        <div class="section-title mt-5">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Empowering Individuals and Businesses to Grow</h1>
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
              <h3 class="wow fadeInUp">our expertise</h3>
              <h2 class="text-anime-style-3" data-cursor="-opaque">
                We have made banking made easier by caring for your needs.
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
              <a href="contacts" class="btn-default">contact now</a>
            </div>
            <!-- Section Button End -->
          </div>
        </div>
       <a href="faqs">Frequently Asked Questions ...</a>
      </div>
    </div>
    <!-- Our FAQs Section End -->

@endsection
