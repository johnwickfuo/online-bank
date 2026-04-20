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



       <!-- Page Header Start -->
    <div class="page-header mb-2 p-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
					<div class="page-header-box mt-5">
                        <br class="p-5">
						<h1 class="text-anime-style-3 mt-5" data-cursor="-opaque">About {{$settings->site_name}} Savings</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active" aria-current="page">
                                   FDIC-Insured - Backed by the full faith and credit of the U.S. Government
                                </li>
							</ol>
						</nav>
                        <br class="p-5">
					</div>
					<!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

     <!-- Page Single Post Start -->
	<div class="page-single-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Post Featured Image Start -->
                    <div class="post-image">
                        <div class="about-us-video">
                            <figure>
                            <video autoplay muted loop>
                                <source
                                src="temp/custom/assets/videos/hero.mp4"
                                type="video/mp4"
                                />
                            </video>
                            </figure>
                        </div>
                    </div>
                    <!-- Post Featured Image Start -->

                    <!-- Post Single Content Start -->
                    <div class="post-content">
                        <!-- Post Entry Start -->
                        <div class="post-entry">
                            <p class="wow fadeInUp">
                                Established in 1992 at 5069 North Broadway in Chicago, where Vietnamese and
                                Chinese new immigrants settled, International Bank of Chicago has
                                become the largest ethnic community bank in the greater Chicago area. As a community-based certified Community Development Financial Institution(CDFI), International Bank of Chicago is committed to delivering responsible, affordable financing to individuals, small businesses and entrepreneurs that makes positive economic and social impacts in the communities we serve. We offer easy-to-understand,
                                easy-to-use, and easy-to-manage banking products to our customers.
                            </p>

                            <p class="wow fadeInUp" data-wow-delay="0.2s">
                                Our Residential Mortgage team supports first-time homebuyers to achieve their American dream; our Commercial Lending team supports local businesses to survive financial hardship through government programs in concert with our business expansion lending. Our affiliated third-party merchant card provider offers cost-effective solutions for all small businesses, and
                                our branch involvement brings support to the people in their respective communities.
                            </p>

                            <blockquote class="wow fadeInUp" data-wow-delay="0.4s">
                                <p>
                                    Armed with state-of-the-art technology, our professional staff will always listen to our customers' needs first, then develop the best solutions for them with a customized approach. We are building a true customer-centered community bank, where individuals find friendly neighbors, businesses get a supportive
                                    business partner and the communities we serve benefit by our contribution.
                                </p>
                            </blockquote>

                            <p class="wow fadeInUp" data-wow-delay="0.6s">Furthermore, having a budget that prioritizes investments in areas such as technology, marketing, and employee development can propel your business forward. By consistently reviewing performance metrics against your budget, you can spot inefficiencies and identify where to cut costs or reallocate funds for maximum impact.</p>

                            <h2 class="text-anime-style-3">Welcome to the human side of banking</h2>

                            <p class="wow fadeInUp" data-wow-delay="0.8s">
                                Here, we care about the story behind the transaction. That means putting you first in everything we do. Not just listening to your goals, but helping you reach them—all the
                                while guided by your voice, your vision and everything that makes you, well, you.
                            </p>

                             <div class="features-item wow fadeInUp">
                                <div class="icon-box active">
                                    <img src="temp/custom/assets/images/icon-company-history.svg" alt="">
                                </div>
                                <div class="features-item-content">
                                    <h4>Choose what's right for you Choose {{$settings->site_name}}because we helps make your everyday banking simple</h4>
                                </div>
                            </div>


                            <p class="wow fadeInUp" data-wow-delay="1.2s">
                                As a global leader in financial services, we’re transforming businesses and
                                empowering communities with product, services, and contributions, but more
                                importantly, we’re enriching the lives of our clients. See the work we’ve
                                done and how we’re building a better world for everyone around us.

                            </p>
                        </div>
                        <!-- Post Entry End -->

                        <!-- Post Tag Links Start -->
                        <div class="post-tag-links">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <!-- Post Tags Start -->
                                    <div class="post-tags wow fadeInUp" data-wow-delay="0.5s">
                                        <span class="tag-links">
                                            <a href="#">{{$settings->site_name}} </a>
                                            <a href="#">Top Banking</a>
                                            <a href="#">CorporateFinance</a>
                                        </span>
                                    </div>
                                    <!-- Post Tags End -->
                                </div>

                                <div class="col-lg-4">
                                    <!-- Post Social Links Start -->
                                    <div class="post-social-sharing wow fadeInUp" data-wow-delay="0.5s">
                                        <ul>
                                            <li><a href="#"></a></li>
                                            <li><a href="#"></a></li>
                                            <li><a href="#"></a></li>
                                            <li><a href="#"></a></li>
                                        </ul>
                                    </div>
                                    <!-- Post Social Links End -->
                                </div>
                            </div>
                        </div>
                        <!-- Post Tag Links End -->
                    </div>
                    <!-- Post Single Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Single Post End -->








@endsection
