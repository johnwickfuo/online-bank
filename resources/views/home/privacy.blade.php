@php
    if ($settings->redirect_url != null or !empty($settings->redirect_url)) {
        header("Location: $settings->redirect_url", true, 301);
        exit();
    }
@endphp

@extends('layouts.base')
@section('title', 'Terms and Privacy And Policy')
@section('styles')
@parent
@endsection
@inject('content', 'App\Http\Controllers\FrontController')
@section('content')


      <!-- Page Header Start -->
    <div class="page-header mb-2 p-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
					<div class="page-header-box mt-5">
                        <br class="p-5">
						<h1 class="text-anime-style-3 mt-5" data-cursor="-opaque">Privacy Policy</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active" aria-current="page">
                                    A core exploration of our Privacy Information and Regulations
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
        <!-- Privacy policy S t r t -->
        <div class="privacy-policy-area section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Single -->
                        <div class="single-terms mb-30">
                            <br class="p-5">
                            <h5 class="title font-600">PRIVACY NOTICE</h5>
                            <p class="pera mb-20">
                                <br class="p-5">
                                We use a variety of different technologies on our website.
                                These technologies include (but are not limited to) cookies, scripts,
                                fonts and images. Some of these are considered as necessary
                                for us to deliver the website to you. Others are used to enhance our
                                understanding of how you use our website, or to assist in our marketing activities.
                            </p>
                            <p class="pera mb-20">
                                The purpose of this notice it to explain how we use such technologies
                                and the third parties we work with, and to provide you with clear information
                                about their purpose. It also explains how you can control your online preferences.
                            </p>
                            <p class="pera mb-20">
                                New regulations will change the way in which the use of cookies is governed in the future and we'll update this notice once those changes come into effect. We may also revise this notice from time to time. If we make any material changes to the
                                way we use these technologies, we will prominently publish the changes on our website.
                            </p>
                            <h5 class="title font-600">Your Privacy Online</h5>
                            <p class="pera mb-20">
                                We promise to treat any personal information about you securely, fairly and lawfully. We are committed to protecting your privacy.
                            </p>
                            <p class="pera mb-20">
                                When we ask you to provide personal information online it will only be in response to you actively applying for or using one of our online products or services.
                                If you are giving us information for the first time,
                                we shall explain the purposes for which we shall use it at that time. If you are a customer already, this explanation will be in our customer Privacy Notices, which you can find here.
                            </p>
                            <h5 class="title font-600">Cookies – what are they?</h5>
                            <p class="pera mb-20">
                                A “cookie” is a small text file that’s stored on your computer,
                                smartphone, tablet, or other device when you visit a website or use an app.
                                They contain specific information relating to your use of our web site or app,
                                such as login credentials; your preference settings or tracking identifiers.
                            </p>
                            <p class="pera mb-20">
                                Cookies are set by our web server, your browser and the web servers of the
                                third parties whose cookies we deploy on our websites and apps. They can be read,
                                updated or deleted by those same servers each time you visit our web site, depending on the type of cookie.
                            </p>
                            <p class="prem mb-20">
                                Some cookies are deleted when you close your browser. These are known as session cookies. Other cookies (such as tracking cookies or authentication cookies) remain on your device until they expire, or you delete them from your browser. These are known as persistent
                                cookies and enable us to remember things about you as a returning visitor.
                            </p>
                            <p class="prem mb-20">
                                This website uses persistent cookies.
                                Some cookies can impact your fundamental rights to privacy and the protection of your data. As such, we require your
                                consent before they can be accessed or stored on your device. For this reason, we limit our use of cookies as explained below.
                            </p>
                            <p class="prem mb-20"></p>
                        </div>
                        <!-- Single -->

                        <div class="single-terms mb-0">
                            <h5 class="title font-600">Contact Us</h5>
                            <p class="pera mb-20 text-normal">Email: <a href="{{$settings->contact_email}}"><span class="__cf_email__" >{{$settings->contact_email}}</span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End-of Privacy policy-->
    </main>







@endsection


