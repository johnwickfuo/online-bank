<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
  <meta name="description" content="{{$settings->site_name}} - Your New Favorite Bank; credit cards, mortgages, commercial banking, auto loans, investing & retirement planning, checking and business banking.">
  <meta name="keywords" content="{{$settings->site_name}}">
  <meta name="author" content="inittheme">
  <meta property="og:type" content="website">
  <meta property="og:title" content="{{$settings->site_name}} - Your New Favorite Bank">
  <meta name="image" property="og:image" content="{{ asset('/public/' . $settings->favicon) }}">
  <meta property="og:site_name" content="{{$settings->site_name}} - Your New Favorite Bank">
  <meta property="og:description" content="{{$settings->site_name}} - Your New Favorite Bank; credit cards, mortgages, commercial banking, auto loans, investing & retirement planning, checking and business banking.">
  <title>{{$settings->site_name}} - Your New Favorite Bank</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/public/' . $settings->favicon) }}" />

  <link href="temp/custom/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="temp/custom/assets/css/all.css" rel="stylesheet" />
  <link href="temp/custom/assets/css/custom.css" rel="stylesheet" />

  <style>
    /* ======== IMPROVED HEADER STYLES ======== */
    .topbar {
      background: #f8f9fa;
      border-bottom: 1px solid #e2e6ea;
      font-size: 14px;
      color: #333;
      padding: 8px 0;
    }
.logo {
    width: auto;
    height: 100px;
    max-height: 100px;  /* Prevent stretching */
    object-fit: contain;  /* Ensure the entire image fits within the specified height */
}

    .topbar-info-content p {
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 500;
      color: #004080;
    }

    .topbar-info-content img {
      margin-right: 8px;
      width: 18px;
    }

    /* HEADER */
    .main-header {
      background: #fff;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      position: sticky;
      top: 0;
      z-index: 999;
      transition: all 0.3s ease;
    }

    .navbar {
      padding: 12px 0;
    }

    .navbar-brand img {
      max-height: 55px;
      transition: transform 0.3s ease;
    }

    .navbar-brand img:hover {
      transform: scale(1.05);
    }

    .nav-link {
      color: #00264d !important;
      font-weight: 500;
      padding: 10px 16px !important;
      transition: all 0.3s ease;
    }

    .nav-link:hover,
    .nav-link:focus {
      color: #0d6efd !important;
    }

    .navbar-nav .dropdown-menu {
      background: #fff;
      border-radius: 6px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item:hover {
      background-color: #f0f4ff;
      color: #0d6efd !important;
    }

    /* HEADER BUTTONS */
    .header-btn a {
      margin-left: 12px;
      border-radius: 8px;
      padding: 8px 18px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-login {
      color: #004080;
      border: 1px solid #004080;
      background-color: transparent;
    }

    .btn-login:hover {
      background-color: #004080;
      color: #fff;
    }

    .btn-signup {
      background-color: #0d6efd;
      color: #fff;
      border: none;
    }

    .btn-signup:hover {
      background-color: #084298;
      color: #fff;
    }

    /* Fix preloader overlay */
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #0d3d35;
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: opacity 0.5s ease;
    }

    /* RESPONSIVE */
    @media (max-width: 991px) {
      .navbar {
        padding: 8px 0;
      }
      .navbar-brand img {
        max-height: 45px;
      }
      .header-btn {
        margin-top: 10px;
      }
    }
  </style>
  <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '5ff556be10ec68ffe808ffacaea1d5c2484a051f';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

</head>
<body>

  <!-- Preloader -->
  <div class="preloader">
    <div class="loading-container">
      <div class="loading"></div>
      <div id="loading-icon"><img src="temp/custom/assets/images/loader.svg" alt="" /></div>
    </div>
  </div>

  <!-- Topbar -->
  <div class="topbar">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="topbar-info-content">
            <p>
              <img src="temp/custom/assets/images/icon-topbar-info.svg" alt="" />
              World class service from your true international community bank
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="main-header">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
          <img src="{{ asset('/public/' . $settings->logo) }}" alt="Logo" style="height: 100px; width: 100px;">

        </a>

        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="private">Personal</a></li>
            <li class="nav-item"><a class="nav-link" href="cooperate">Cooperate</a></li>
            <li class="nav-item"><a class="nav-link" href="insurance">Insurance</a></li>
            <li class="nav-item"><a class="nav-link" href="mortgages">Mortgages</a></li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="savingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sefton Savings</a>
              <ul class="dropdown-menu" aria-labelledby="savingsDropdown">
                <li><a class="dropdown-item" href="savings">Savings</a></li>
                <li><a class="dropdown-item" href="loans">Business Loans</a></li>
                <li><a class="dropdown-item" href="cards">Credit Cards</a></li>
                <li><a class="dropdown-item" href="about">About Us</a></li>
                <li><a class="dropdown-item" href="contact">Contact Us</a></li>
                <li><a class="dropdown-item" href="privacy">Privacy Policy</a></li>
                <li><a class="dropdown-item" href="terms">Terms Of Use</a></li>
              </ul>
            </li>
          </ul>

          <!-- Buttons -->
          <div class="header-btn d-flex align-items-center">
            <a href="login" class="btn-login">Login</a>
            <a href="register" class="btn-signup">Open An Account</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  @yield('content')

  <!-- Footer (unchanged) -->
  ... (your footer and scripts remain the same) ...

  <!-- ✅ Fix preloader disappearance -->
  <script>
    window.addEventListener('load', function() {
      const preloader = document.querySelector('.preloader');
      if (preloader) {
        preloader.style.opacity = '0';
        setTimeout(() => preloader.style.display = 'none', 500);
      }
    });
  </script>

  <!-- Bootstrap JS -->
  <script src="temp/custom/assets/js/bootstrap.min.js"></script>

</body>
</html>

