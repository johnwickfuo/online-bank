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
            <video autoplay muted loop id="myVideo"><source src="temp/custom/assets/videos/credit-card.mp4" type="video/mp4"></video>
        </div>
        <!-- Video End -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mt-5">
                    <!-- Hero Content Start -->
                    <div class="hero-content ">
                        <!-- Section Title Start -->
                        <div class="section-title mt-5">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Credit & Debit Cards Management</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                              <small> Maximize your wealth with tailored strategies and expert guidance.
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
                With Banking Solutions Designed to Increase the
                productivity and growth, together we will make your business vision a reality.
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
                 International Bank of Chicago customers are able to use their ATM Cards
                 at over 250,000 Cirrus, and Star ATM terminals across the United States and abroad.
                 A card will be mailed to you within a week of your application being approved.
              </p>
              <hr class="m-5">
              <p>
                Business applicants must sign a Business ATM/Debit Card Agreement
                before a check card can be ordered.
              </p>
            </div>
            <!-- Section Title Content End -->
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

   <br><br>


</div>
@endsection
