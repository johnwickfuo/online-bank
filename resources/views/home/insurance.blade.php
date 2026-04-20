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
            <video autoplay muted loop id="myVideo"><source src="temp/custom/assets/videos/insurance.mp4" type="video/mp4"></video>
        </div>
        <!-- Video End -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mt-5">
                    <!-- Hero Content Start -->
                    <div class="hero-content ">
                        <!-- Section Title Start -->
                        <div class="section-title mt-5">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Quality insurance without the hassle</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                              <small>
                                Our customers are at the heart of what we do, and we know how important
                                it is for you to have peace of mind. We’ve partnered with top insurance
                                providers to offer premium insurance to help protect against any unexpected costs.
                                For quality insurance without the hassle, we’ve got you covered.
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
              <h3 class="wow fadeInUp">Insurance</h3>
              <h2 class="text-anime-style-3" data-cursor="-opaque">
                Explore insurance topics
              </h2>
              <h4 class="title">Insure your home, its contents or both</h4>
                <p class="pera">
                    1 in 7 chance of winning back the cost of your annual home insurance premium
                    if you take out a policy. Contact Customer support for more details
                    New policies, Over 18s only, policy must be active at time of draw, Terms apply.
                    See how your data will be used in conjunction with this prize draw.
                </p>
            </div>
            <!-- Section Title End -->
          </div>

          <div class="col-lg-5">
            <!-- Section Title Content Start -->
            <div
              class="section-title-content wow fadeInUp"
              data-wow-delay="0.25s"
            >
              <h4 class="title">Overview</h4>
                <p class="pera">
                    Our customers are at the heart of what we do, and we know how
                    important it is for you to have peace of mind. We’ve partnered with top
                    insurance providers to offer premium insurance to help protect
                    against any unexpected costs. For quality insurance without the hassle,
                    we’ve got you covered.
                </p>
              <div class="col-12 mt-2">
                 <h4 class="title">Pet Insurance</h4>
                <p class="pera">
                    Your four-legged friend deserves the same protection as the rest of your family, so we’ve partnered with Everypaw Pet Insurance to offer
                    award-winning cover. Find out more about easy-to-manage insurance for dogs, cats and rabbits with 24/7 access to vets.
                </p>
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
                        <h3>Trust Service *</h3>
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
                            <p>
                                IBC Trust service is a division of International Bank of Chicago. We offer
                                Self-Directed Individual Retirement Accounts (SD-IRA) and Land Trusts.
                                Self-directed IRAs are for those who want to invest all or a portion of
                                their retirement funds in non-brokerage investment products. As your
                                IRA custodian, our truly self-directed IRA services give you more control
                                and flexibility since normal IRAs do not allow you to personally "touch"
                                your assets under the IRA umbrella.
                                Please contact us for more details of the SD-IRA and Land Trust service.
                            </p>
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
                        <img src="temp/custom/assets/images/about-ban.jpg" alt="" />
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
      </div>
    </div>
    <!-- Company Wisdom Section End -->
@endsection
