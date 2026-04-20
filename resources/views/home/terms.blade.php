@php
    if ($settings->redirect_url != null or !empty($settings->redirect_url)) {
        header("Location: $settings->redirect_url", true, 301);
        exit();
    }
@endphp
@extends('layouts.base')


@inject('content', 'App\Http\Controllers\FrontController')
@section('content')
<div class="main">

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
                                    A core exploration of our Terms of Service
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
                    <div class="col-xl-12 col-lg-12 p-5">
                        <!-- Single -->
                        <div class="single-terms mb-30">

                            <p class="pera mb-20">
                                <br class="p-5">
                                We are the owner or the licensee of all intellectual property rights in our site, and in the material published on it. Those works are protected
                                by copyright laws and treaties around the world. All such rights are reserved.
                                You may print off one copy, and may download extracts, of any page(s) from our site for your personal use and you may draw the attention
                                of others within your organisation to content posted on our site.
                            </p>
                            <p class="pera mb-20">
                                You must not modify the paper or digital copies of any materials you have printed off or downloaded in any way, and you must not use any
                                illustrations, photographs, video or audio sequences or any graphics separately from any accompanying text.
                                Our status (and that of any identified contributors) as the authors of content on our site must always be acknowledged.
                            </p>
                            <p class="pera mb-20">
                                New regulations will change the way in which the use of cookies is governed in the future and we'll update this notice once those changes come into effect. We may also revise this notice from time to time. If we make any material changes to the
                                way we use these technologies, we will prominently publish the changes on our website.
                                You must not use any part of the content on our site for commercial purposes without obtaining a licence to do so from us or our licensors.
                                If you print off, copy or download any part of our site in breach of these terms of use, your right to use our site will cease immediately and you must, at our option, return or destroy any copies of the materials you have made.
                            </p>
                            <h5 class="title font-600">Information Reliability</h5>
                            <p class="pera mb-20">
                               The content on our site is provided for general information only. It is not intended to amount to advice on which you should rely. You must obtain professional or specialist advice
                               before taking, or refraining from, any action on the basis of the content on our site.
                            </p>
                            <p class="pera mb-20">
                                Although we make reasonable efforts to update the information on our site, we make no representations,
                                warranties or guarantees, whether express or implied, that the content on our site is accurate, complete or up to date.
                            </p>
                            <h5 class="title font-600">User-generated content is not approved by us</h5>
                            <p class="pera mb-20">
                                This website may include information and materials uploaded by other users of the site, including to bulletin boards and chat rooms. This information and these materials have not been verified or approved by us.
                                The views expressed by other users on our site do not represent our views or values.
                                If you wish to complain about information and materials uploaded by other users please contact us using the customer chat function.
                            </p>
                            <h3>
                                Uploading content to our site
                            </h3>
                            <p class="pera mb-20">
                                Whenever you make use of a feature that allows you to upload content to our site, or to make contact with other users of our site, you must comply with the content standards set out in these terms.

                                You warrant that any such contribution does comply with those standards, and you will be liable to us and indemnify us for any breach of that warranty. This means you will be responsible for any loss or damage we suffer as a result of your breach of warranty.
                             </p>
                            <p class="prem mb-20">
                                Any content you upload to our site will be considered non-confidential and non-proprietary. You retain all of your ownership rights in your content, but you are required to grant us and other users of our site a limited licence to use, store and copy that content and to distribute and make it available to third parties.



                            </p>
                            <p class="prem mb-20">
                                We also have the right to disclose your identity to any third party who is claiming that any content posted or uploaded by you to our site constitutes a violation of their intellectual property rights, or of their right to privacy.
                                We have the right to remove any posting you make on our site if, in our opinion, your post does not comply with the content standards set out in these terms.
                            </p>
                        </div>
                        <!-- Single -->

                        <div class="single-terms mb-0">
                            <h5 class="title font-600">Contact Us</h5>
                            <p class="pera mb-20 text-normal">Email: <a href="https://cdn-cgi/l/email-protection.html#ea83848c85aa998f8c9e8584998b9c83848d99c4898587"><span class="__cf_email__" data-cfemail="660f080009261503001209081507100f0801154805090b">{{$settings->contact_email}}</span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End-of Privacy policy-->
    </main>




@endsection
