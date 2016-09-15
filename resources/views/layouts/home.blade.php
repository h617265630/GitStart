<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
   @yield('info')
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/resources/views/frontassets/img/favicon.ico')}}">

    <!-- Google Fonts
    ============================================ --
    <link href='http://fonts.useso.com/css?family=Lato:400,400italic,900,700,700italic,300' rel='stylesheet' type='text/css'>
    -->
    <!-- <link href='http://fonts.useso.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>-->


    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('/resources/views/frontassets/css/bootstrap.min.css')}}">

    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('/resources/views/frontassets/lib/nivo-slider/css/nivo-slider.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('/resources/views/frontassets/lib/nivo-slider/css/preview.css')}}" type="text/css" media="screen" />
    <!-- Fontawsome CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('/resources/views/frontassets/css/font-awesome.min.css')}}">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('/resources/views/frontassets/css/owl.carousel.css')}}" >

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('/resources/views/frontassets/css/jquery-ui.css')}}">

    <!-- meanmenu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('/resources/views/frontassets/css/meanmenu.min.css')}}">

    <!-- animate CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('/resources/views/frontassets/css/animate.css')}}">


    <script type="text/javascript" src="{{asset('/resources/views/frontassets/js/vendor/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('/resources/org/layer/layer.js')}}"></script>
    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('/resources/views/frontassets/style.css')}}">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('/resources/views/frontassets/css/responsive.css')}}">

    <!-- modernizr JS
    ============================================ -->
    <script src="{{asset('/resources/views/frontassets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <!--braintree JS
    ============================================ -->

    <script src="https://js.braintreegateway.com/js/braintree-2.27.0.min.js"></script>

    <!--raty_master JS/CSS
     ============================================ -->
    <link href="{{asset('/resources/org/rate_master/lib/jquery.raty.css')}}" media="all" rel="stylesheet" type="text/css" />

    <script src="{{asset('/resources/org/rate_master/lib/jquery.raty.js')}}" type="text/javascript"></script>

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--Page Wrapper Start-->
<div class="home-two-wrapper">
    <!--Header Start-->
    <header class="home-two-header">
        <div class="header-top-home-two">
            <div class="container">
                <div class="header-container">
                    <div class="row">
                        <div class="col-md-6 col-sm-7">
                            <div class="header-contact">
                                <span>@if(session('user'))Hi <span style="color:red">{{session('user')['username']}}</span> ,@else @endif Welcome to shrike.com </span> / <span>I wish you like it</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-5">
                            <div class="currency-language">
                                <div class="currency-menu">
                                    <a href="{{url('/login')}}">Log in</a>
                                </div>
                                <div class="language-menu">
                                  <a href="{{url('/signup')}}">Sign up</a>
                                </div>
                                @if(session('user'))
                                <div class="account-menu">
                                    <ul>
                                        <li><a href="{{url('/myaccount')}}">My Account <i class="fa fa-angle-down"></i></a>
                                            <ul class="account-dropdown">
                                                <li><a href="{{url('/wishlist')}}">My Wishlist</a></li>
                                                <li><a href="{{url('/cart')}}">My Cart</a></li>
                                                <li><a href="{{url('/checkout')}}">Checkout</a></li>
                                                <li><a href="{{url('/logout')}}">Log out</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main-home-two">
            <div class="container">
                <div class="header-content-home-two">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 hidden-xs">
                            <div id="search-category">
                                <form class="search-box-two" action="{{url('/search')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="search" placeholder="Search here..." name="search">
                                    <button id="btn-search-two" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="logo">
                                <a href="{{url('/')}}"><img  src="{{asset('resources/views/frontassets/img//logo/logo.png')}}" alt="MOZAR"></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">
                            <ul class="header-r-cart header-cart-two">
                                <li><a class="cart" href="{{url('/cart')}}">Shopping Cart <span>{{$countitem}} item</span></a>

                                    <div class="mini-cart-content">
                                        <form id="cartupdate" class="am-form"  action="{{url('/updatecart')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="put">
                                            @foreach($cartgood as $g)
                                            <input type="hidden" name="id[]" value="{{$g->item_id}}">
                                        <div class="cart-products-list">
                                            <div class="cart-products">
                                                <div class="cart-image">
                                                    <a href="#"><img src="{{$g->good_img}}" style="height:40px;width:25px"alt=""></a>
                                                </div>
                                                <div class="cart-product-info">
                                                    <a href="#" class="product-name">{{$g->good_name}}</a>
                                                        <a class="remove-product"  href="{{url('remove/'.$g->id)}}">Remove item</a>
                                                        <div class="price-times">
                                                            <span class="quantity"><strong><input type="text" name="goodQuantity[]" value="{{$g->goodQuantity}}" size="1" maxlength="12"> x</strong></span>
                                                            <span class="p-price">{{$g->listprice}}</span>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                        <div class="cart-price-list">
                                            <p class="price-amount">SUBTotal : <span>${{$totalprice}}</span> </p>
                                            <div class="cart-buttons">
                                                <a href="#" onclick="document.getElementById('cartupdate').submit()">update</a>
                                            </div>
                                            <div class="cart-buttons">
                                                <a href="{{url('/checkout')}}">Checkout</a>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Mainmenu Start-->
        <div class="mainmenu-area-home-two hidden-sm hidden-xs">
            <div id="sticker">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 hidden-sm">
                            <div class="mainmenu">
                                <nav>
                                    <ul id="nav">
                                        <li class="current"><a href="{{url('/')}}">home</a>
                                        @foreach($nav as $n)
                                        <li class="current"><a href="{{url('/categrid')}}">{{$n->nav_name}}</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{url('/')}}" class="mega-title">Homepage</a></li>
                                                <li><a href="">Homepage Version 2</a></li>
                                                <li><a href="index-3.html">Homepage Version 3</a></li>
                                                <li><a href="index-4.html">Homepage Version 4</a></li>
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Mainmenu-->
        <!-- Mobile Menu Area start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="{{url('/')}}}">HOME</a>
                                        <ul>
                                            <li><a href="index-2.html">Home 2</a></li>
                                            <li><a href="index-3.html">Home 3</a></li>
                                            <li><a href="index-4.html">Home 4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">SHOP</a>
                                        <ul>
                                            <li><a href="shop-grid.html">Shop Grid</a></li>
                                            <li><a href="shop-list.html">Shop List</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Blog</a>
                                        <ul>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">ABOUT</a>
                                    <li><a href="#">PAGES</a>
                                        <ul>
                                            <li><a href="{{url('/myaccount')}}">My Account</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">CONTACT</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu Area end -->
    </header>
    <!--End of Header Area-->
    @yield('content')
    <!--Brand Area Strat-->
    <div class="brand-area">
        <div class="container">
            <div class="brand-content-home-two">
                <div class="row">
                    <div class="brand-carousel">
                        <div class="col-md-2">
                            <div class="single-brand">
                                <a href="#">
                                    <img src="{{asset('resources/views/frontassets/img/brand/1.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="single-brand">
                                <a href="#">
                                    <img src="{{asset('resources/views/frontassets/img/brand/2.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="single-brand">
                                <a href="#">
                                    <img src="{{asset('resources/views/frontassets/img/brand/3.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="single-brand">
                                <a href="#">
                                    <img src="{{asset('resources/views/frontassets/img/brand/4.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="single-brand">
                                <a href="#">
                                    <img src="{{asset('resources/views/frontassets/img/brand/5.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="single-brand">
                                <a href="#">
                                    <img src="{{asset('resources/views/frontassets/img/brand/6.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="single-brand">
                                <a href="#">
                                    <img src="{{asset('resources/views/frontassets/img/brand/1.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="single-brand">
                                <a href="#">
                                    <img src="{{asset('resources/views/frontassets/img/brand/6.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Brand Area-->
    <!--Footer Widget Area Start-->
    <div class="footer-widget-area-home-two">
        <div class="container">
            <div class="footer-widget-padding">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="single-widget">
                            <div class="footer-widget-title">
                                <h3>links</h3>
                            </div>
                            <div class="footer-widget-list ">
                                <ul>
                                    @foreach($link as $l)
                                        <li><a href="{{url($l->link_url)}}">{{$l->link_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
                        <div class="single-widget">
                            <div class="footer-widget-title">
                                <h3>My account</h3>
                            </div>
                            <div class="footer-widget-list ">
                                <ul>
                                    <li><a href="{{url('/myaccount')}}">My Account</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Specials</a></li>
                                    <li><a href="#">Site Map</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="single-widget">
                            <div class="footer-widget-title">
                                <h3>Contact us</h3>
                            </div>
                            <div class="footer-widget-list ">
                                <ul class="address">
                                    <li><span class="fa fa-map-marker"></span> Addresss: Lorem ipsum dolor</li>
                                    <li><span class="fa fa-phone"></span> (800) 0123 4567 890</li>
                                    <li class="support-link"><span class="fa fa-envelope-o"></span> admin@bootexperts.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Footer Widget Area-->
    <!--Footer Area Start-->
    <footer class="footer footer-home-two">
        <div class="container">
            <div class="footer-padding">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-8">
                        <nav>
                            <ul id="footer-menu">
                                <li><a href="{{url('/about')}}">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                            <p class="author">Copyright © 2016 <a href="#">BootExperts</a> All Rights Reserved.</p>
                        </nav>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-4">
                        <p class="payment-image">
                            <img src="img/payment.png" alt="">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End of Footer Area-->
</div>
<!--End of Page Wrapper-->
<script>
    function addtocart(id)
    {
        $.post("{{url('/addtocart/')}}/" + id, {
            '_method': 'get',
            '_token': '{{csrf_token()}}'
        }, function (data) {
            if (data.status == 1) {
                layer.confirm(  "\"" + data.msg['good_name'] + "\"" + '成功加入购物车',{
                    icon:6,btn: ['继续购物', '走去结算！'] //按钮s
                }, function () {
                    layer.msg('祝君愉快', {icon: 6});
                    window.location.reload();
                }, function () {
                    window.location.href="http://localhost/startup/cart";
                });
            }
            else if(data.status == 2)
            {
                layer.confirm("You haven't log in,please login first to add item to cart",{
                            icon:5,btn:['继续购物','登录']
                        },function(){
                            layer.msg('祝君愉快',{icon:6});
                        },function() {
                            window.location.href = "http://localhost/startup/login";
                        }
                );
            }
        });
    }
    function addtowishlist(id)
    {
        $.post("{{url('/addtowishlist/')}}/" + id, {
            '_method': 'get',
            '_token': '{{csrf_token()}}'
        }, function (data) {
            if (data.status == 1) {
                layer.confirm("\"" + data.msg['good_name'] + "\"" + '成功加入愿望清单', {
                    icon:6,btn: ['继续购物', '走去看看！'] //按钮s
                }, function () {
                    layer.msg('祝君愉快', {icon: 6});
                    window.location.reload();
                }, function () {
                    window.location.href="http://localhost/startup/wishlist";
                });
            }
            else if(data.status == 0)
            {
                layer.confirm("You haven't log in,please login first to add item to wishlist",{
                            icon:5,btn:['继续购物','登录']
                        },function(){
                            layer.msg('祝君愉快',{icon:6});
                        },function() {
                            window.location.href = "http://localhost/startup/login";
                        }
                );
            }
        });
    }
</script>
<!-- bootstrap JS
============================================ -->
<script src="{{asset('/resources/views/frontassets/js/bootstrap.min.js')}}"></script>

<!-- nivo slider js
============================================ -->
<script src="{{asset('/resources/views/frontassets/lib/nivo-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>

<script src="{{asset('/resources/views/frontassets/lib/nivo-slider/home.js')}}" type="text/javascript"></script>

<!-- wow JS
============================================ -->
<script src="{{asset('/resources/views/frontassets/js/wow.min.js')}}"></script>

<!-- meanmenu JS
============================================ -->
<script src="{{asset('/resources/views/frontassets/js/jquery.meanmenu.js')}}"></script>

<!-- owl.carousel JS
============================================ -->
<script src="{{asset('/resources/views/frontassets/js/owl.carousel.min.js')}}"></script>

<!-- price-slider JS
============================================ -->
<script src="{{asset('/resources/views/frontassets/js/jquery-price-slider.js')}}"></script>

<!-- scrollUp JS
============================================ -->
<script src="{{asset('/resources/views/frontassets/js/jquery.scrollUp.min.js')}}"></script>

<!--Countdown js-->
<script src="{{asset('/resources/views/frontassets/js/jquery.countdown.min.js')}}"></script>

<!-- Sticky Menu JS
============================================ -->
<script src="{{asset('/resources/views/frontassets/js/jquery.sticky.js')}}"></script>

<!-- Elevatezoom JS
============================================ -->
<script src="{{asset('/resources/views/frontassets/js/jquery.elevateZoom-3.0.8.min.js')}}"></script>

<!-- plugins JS
============================================ -->
<script src="{{asset('/resources/views/frontassets/js/plugins.js')}}"></script>

<!-- main JS
============================================ -->
<script src="{{asset('/resources/views/frontassets/js/main.js')}}"></script>
<script>
    function successinfo()
    {
        layer.alert('add item to cart successfully');
    }
</script>
</body>
</html>