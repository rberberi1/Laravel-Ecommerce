@php
    $categories=App\Models\Category::latest()->get();
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ecommerce</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/fonts/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&family=Poiret+One&display=swap" rel="stylesheet">
    


    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  </head>
  <body class="hompage">
    <header id="header">
      <div class="header-wrap">
        <nav class="secondary-nav border-top border-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="top-menu d-flex flex-wrap justify-content-between">
                <ul class="left-block list-unstyled d-flex flex-wrap">
                  <li class="menu-item text-uppercase">Call Us: +5555-00-444</li>
                  <li class="menu-item text-uppercase">Mail Us: <a href="#">ecommerce@gmail.com</a></li>
                </ul>
                <ul class="right-block d-flex flex-wrap list-unstyled justify-content-evenly">
                  <li class="menu-item">
                    <form class="searchbar">
                      <input type="text" name="search" placeholder="Search Here..">
                      <i class="icon icon-search"></i>
                    </form>
                  </li>
                  <li class="menu-item dropdown-submenu">
                    <a href="#" class="currency-item">USD</a>
                    <i class="icon icon-caret-down"></i>
                    <ul class="dropdown-currency list-unstyled bg-light">
                      <li><a href="#">USD</a></li>
                      <li><a href="#">EURO</a></li>
                      <li><a href="#">ALL</a></li>
                    </ul>
                  </li>
                  @auth
                    <li class="menu-item">
                        <a href="{{ route('userprofile') }}"><i class="icon icon-user"></i> {{Auth::user()->name}}</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('addtocart') }}"><i class="icon icon-shopping-cart"></i> My Cart</a>
                    </li>
                    <li class="menu-item">
                      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
                      </svg>
                        Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                  </li>
                @else
                    <li class="menu-item">
                        <a href="{{ route('login') }}"><i class="icon icon-user"></i> Login</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('register') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                          <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                        </svg>  Register</a>
                    </li>
                @endauth
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <nav class="primary-nav">
          <div class="container-fluid">
            <div class="row d-flex align-items-center">
              <div class="col-md-2 col-sm-6">
                
              </div>
              <div class="col-md-10 col-sm-6">
                <div class="navbar d-flex">
                  <div class="main-menu stellarnav desktop light">
                    <ul class="menu-list list-unstyled">
                      <li class="menu-item">
                        <a href="{{ route('Home') }}" class="text-uppercase">Home</a>
                      </li>
                      <li class="menu-item has-sub" style="position: relative;">
                        <a href="#" class="text-uppercase item-anchor" data-effect="Pages">Shop</a>
                        <ul class="submenu" style="display: none; position: absolute; left: 0; top: 100%; background-color: white; list-style: none; padding: 0; margin: 0; z-index: 1000;">
                          @foreach ($categories as $category)
                            <li>
                              <a href="{{ route('category', [$category->id, $category->slug]) }}" class="text-uppercase">{{ $category->category_name }}</a>
                            </li>
                          @endforeach
                        </ul>
                      </li>
                      <li class="menu-item">
                        <a href="{{ route('newrelease') }}" class="text-uppercase">New Releases</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{ route('todaysdeal') }}" class="text-uppercase">Today's Deal</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{ route('customerservice') }}" class="text-uppercase">Customer Service</a>
                      </li>
                    </ul>
                    
                    <script>
                      document.addEventListener('DOMContentLoaded', (event) => {
                        document.querySelectorAll('.has-sub > a').forEach(element => {
                          element.addEventListener('click', (e) => {
                            e.preventDefault();
                            let submenu = element.nextElementSibling;
                            if (submenu.style.display === 'block') {
                              submenu.style.display = 'none';
                            } else {
                              submenu.style.display = 'block';
                            }
                          });
                        });
                      });
                    </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <!-- Common part -->
    <div class="container py-3" style="margin-top: 10px;">
      @yield('main-content')
    </div>
    <!-- End of common part -->

    <footer id="footer" class="bg-grey padding-large overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="footer-content">
            <div class="row d-flex flex-wrap">
              <div class="footer-menu col-md-2 col-sm-6 col-xs-6">
                <h5 class="widget-title text-uppercase">Quick Links</h5>
                <ul class="list-unstyled">
                  <li><a href="index.html">Home</a></li>
                  <li><a href="{{ route('newrelease') }}">New Releases</a></li>
                  <li><a href="{{ route('todaysdeal') }}">Today's Deals</a></li>
                  <li><a href="{{ route('customerservice') }}">Customer Service</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                </ul>
              </div>
              <div class="footer-menu col-md-3 col-sm-6 col-xs-6">
                <h5 class="widget-title text-uppercase">Your Account</h5>
                <ul class="list-unstyled">
                  <li><a href="#">My Account</a></li>
                  <li><a href="#">Login</a></li>
                  <li><a href="#">Wish Lists</a></li>
                  <li><a href="#">My Addresses</a></li>
                  <li><a href="#">My Orders</a></li>
                </ul>
              </div>
              <div class="footer-menu col-md-4 col-sm-6 col-xs-6">
                <h5 class="widget-title text-uppercase">Special Products</h5>
                <div class="footer-post d-flex flex-wrap">
                  <div class="post-image">
                    <img src="{{ asset('home/images/dring.jpg')}}" alt="post" class="footer-image">
                  </div>
                  <div class="text-block">
                    <a href="#">Diamond Crescent Silver Ring</a>
                    <span class="meta-price text-primary">$28.00</span>
                  </div>
                </div>
                <div class="footer-post d-flex flex-wrap">
                  <div class="post-image">
                    <img src="{{ asset('home/images/dring.jpg')}}" alt="post" class="footer-image">
                  </div>
                  <div class="text-block">
                    <a href="#">Diamond Crescent Golden Ring</a>
                    <span class="meta-price text-primary">$48.00</span>
                  </div>
                </div>
                <div class="footer-post d-flex flex-wrap">
                  <div class="post-image">
                    <img src="{{ asset('home/images/dtop.jpg')}}" alt="post" class="footer-image">
                  </div>
                  <div class="text-block">
                    <a href="#">Diamond Crescent Curve Ring</a>
                    <span class="meta-price text-primary">$58.00</span>
                  </div>
                </div>
              </div>
              <div class="footer-menu col-md-3 col-sm-6 col-xs-6">
               
                <div class="content">
                  <div class="widget-content">
                    <p>Stay Updated With Us For News And Offers</p>
                    <div class="newsletter-button d-flex flex-wrap align-items-center">
                      <input type="text" name="Subscribe" placeholder="Your Email Address">
                      <button class="btn btn-primary">Subscribe</button>
                    </div>
                  </div>
                  <div class="widget-content">
                    <div class="address">
                      <ul class="list-unstyled">
                        <li><i class="icon icon-location text-primary"></i>PO Box 1612 Collin Street, NYC</li>
                        <li><i class="icon icon-phone text-primary"></i>(+801) - 2345 - 6789</li>
                        <li>
                          <i class="icon icon-envelope text-primary"></i>
                          <div class="mail-address">
                            <a href="#">info@shop.com</a>
                            <a href="#">support@shop.com</a>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="social-icons">
                      <ul class="d-flex flex-wrap list-unstyled">
                        <li><a href="#"><i class="icon icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon icon-pinterest"></i></a></li>
                        <li><a href="#"><i class="icon icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon icon-google-plus"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-5">
            
          </div>
        </div>
      </div>
    </footer>
    
    <script src="{{ asset('home/js/jquery-1.11.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('home/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{ asset('home/js/script.js')}}"></script>
    
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.main-swiper', {
          loop: true,
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
        });
      });
    </script>
  </body>
</html>
