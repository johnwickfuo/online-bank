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
@section('title', 'Contact Us')


@section('content')


      <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-3" data-cursor="-opaque">Contact Us</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active" aria-current="page">contact</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Contact Us Start -->
    <div class="page-contact-us">
        <div class="contact-us bg-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Contact Information Start -->
                        <div class="contact-information">
                            <!-- Contact Item Start -->
                            <div class="contact-info-item wow fadeInUp">
                                <div class="icon-box">
                                    <img src="temp/custom/assets/images/icon-phone.svg" alt="">
                                </div>
                                <div class="contact-info-content">
                                    <h3>contact</h3>
                                    <p><a class="text-dark" href="tel:+"></a></p>
                                    <p><a class="text-dark" href="tel:+"></a></p>
                                </div>
                            </div>
                            <!-- Contact Item End -->

                            <!-- Contact Item Start -->
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.25s">
                                <div class="icon-box">
                                    <img src="temp/custom/assets/images/icon-email.svg" alt="">
                                </div>
                                <div class="contact-info-content">
                                    <h3>email</h3>
                                    <p><a class="text-dark" href="https://cdn-cgi/l/email-protection.html#274e494148675442415348495446514e4940540944484a"><span class="__cf_email__" data-cfemail="0e676068614e7d6b687a61607d6f786760697d206d6163">[email&#160;protected]</span></a></p>
                                    <p><a class="text-dark" href="https://cdn-cgi/l/email-protection.html#fc8f898c8c938e88bc8f999a8893928f9d8a95929b8fd29f9391"><span class="__cf_email__" data-cfemail="6a191f1a1a05181e2a190f0c1e0504190b1c03040d1944090507">[email&#160;protected]</span></a></p>
                                </div>
                            </div>
                            <!-- Contact Item End -->

                            <!-- Contact Item Start -->
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.5s">
                                <div class="icon-box">
                                    <img src="temp/custom/assets/images/icon-location.svg" alt="">
                                </div>
                                <div class="contact-info-content">
                                    <h3>address</h3>
                                    <p>
                                       {{$settings->address}}                                 </p>
                                </div>
                            </div>
                            <!-- Contact Item End -->
                        </div>
                        <!-- Contact Information End -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Us Form Start -->
        <div class="contact-us-form">
            <div class="container">
                <div class="row section-row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">contact us</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Get in touch with our experts finance</h2>
                        </div>
                        <!-- Section Title End -->
                    </div>

                    <div class="col-lg-6 col-md-4">
                        <!-- Section Button Start -->
                        <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
                            <a href="tel:" class="btn-default contact-btn"></a>
                        </div>
                        <!-- Section Button End -->
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <!-- Google Map Start -->
                        <div class="google-map">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3259.151658579666!2d-80.8433089236464!3d35.22759455475933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8856a0251de2759b%3A0x3b1919d97ec79f22!2sHearst%20Tower%2C%20214%20N%20Tryon%20St%2C%20Charlotte%2C%20NC%2028202%2C%20USA!5e0!3m2!1sen!2sng!4v1747064131997!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <!-- Google Map End -->
                    </div>

                    <div class="col-lg-6">
                        <!-- Contact Form Start -->
                        <div class="contact-form">
                            <!-- Contact Form Title Start -->
                            <div class="contact-form-title wow fadeInUp">
                                <h2>Have any questions?</h2>
                            </div>

                              @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ session('error') }}

    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}

    </div>
@endif
                            <!-- Contact Form Title End -->

                            <form  action="{{route('enquiryfront')}}" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.25s">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="email" name ="email" class="form-control" id="email" placeholder="Email Address" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-5">
                                        <textarea name="message" class="form-control" id="message" rows="5" placeholder="Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                     <style>
                                    .captcha-box {
                                        display: inline-block;
                                        padding: 10px;
                                        background-color: #f4f4f4;
                                        border: 2px solid #ccc;
                                        font-family: monospace;
                                        font-size: 18px;
                                        color: #333;
                                        border-radius: 5px;
                                    }
                                </style>
                                <div class="captcha-box mb-3">

                                    {{$captcha}} <input type="text" maxlength="100" required placeholder="Enter Captcha *" class="form-control" name="captcha">
                                    <input type="hidden" maxlength="50" required  class="form-control" name="captcha_confirmation" value="{{$captcha}}">
                                </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn-highlighted">submit message</button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Contact Form End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact InfUs Form End -->
    </div>
    <!-- Page Contact Us End -->



@endsection

