@extends('layouts.home')

@section('info')
    <title>{{Config::get("web.conf_title")}}</title>
    <meta name="description" content="{{Config::get('web.description')}}">
    <meta name="keyword" content="{{Config::get('web.keyword')}}">
@endsection

@section('content')
    <!--Slider Area Start-->
    <div class="slider-area-home-two">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="preview-2">
                        <div id="nivoslider" class="slides">
                            <a href="#"><img src="{{asset('resources/views/frontassets/img/slider/slider-4.jpg')}}" alt=" " title="#slider-1-caption1"/></a>
                            <a href="#"><img src="{{asset('resources/views/frontassets/img/slider/slider-5.jpg')}}" alt=" " title="#slider-1-caption1"/></a>
                        </div>
                        <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
                            <div class="timethai" style="
                                        position:absolute;
                                        bottom:0;
                                        left:0;
                                        background-color:rgba(224, 53, 80, 0.6);
                                        height:3px;
                                        -webkit-animation: myfirst 5000ms ease-in-out;
                                        -moz-animation: myfirst 5000ms ease-in-out;
                                        -ms-animation: myfirst 5000ms ease-in-out;
                                        animation: myfirst 5000ms ease-in-out;
                                        ">
                            </div>
                            <div class="banner-content slider-1 hidden-xs">
                                <div class="text-content">
                                    <h1 class="title1"><span>collection</span></h1>
                                    <h2 class="title2" ><span>2015 new design</span></h2>																	<h3 class="title3">style Mozar always loved men in whatever fashion season spring  winter.</h3>																																					<div class="banner-readmore">
                                        <a href="#" title="Read more">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm">
                    <div class="banner-box">
                        <a href="">
                            <img src="{{asset('resources/views/frontassets/img/banner/8.jpg')}}" alt=" ">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Slider Area-->

    <!--Timer Product Carousel Area Start-->
    <div class="timer-product-carousel-area">
        <div class="container">
            <div class="section-padding">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title"><h2>Sale Off</h2></div>
                    </div>
                </div>
                <div class="row">
                    <div class="product-carousel">
                        @foreach($sale as $s)
                            <div class="col-md-3">
                                <!--item 1 start-->
                                <div class="single-product-item">
                                    <div class="single-product clearfix">
                                        <div class="sale-product-label"><span>sale</span></div>
                                        <a href="{{url('good/'.$s->id)}}">
                                            <span class="product-image">
                                                <img src="{{$s->good_img}}" alt=" ">
                                            </span>
                                            <span class="product-image hover-image">
                                                <img src="{{$s->good_img}}" alt=" ">
                                            </span>
                                        </a>
                                        <div class="button-actions clearfix">
                                            <ul class="add-to-links">
                                                <li> <a href="javascript:;" onclick="addtocart({{$s->id}})"><i class="fa fa-shopping-cart"></i></a></li>
                                                <li class="quickview">
                                                    <a class="btn-quickview modal-view" href="#" onclick="quickview({{$s->id}})" data-toggle="modal" data-target="#productModal">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-wishlist" href="javascript:;" onclick="addtowishlist({{$s->id}})">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" href="#">
                                                        <p>like</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h2 class="single-product-name"><a href="#"> Donec ac tempus </a></h2>
                                    <div class="price-box">
                                        <p class="old-price">
                                            <span class="price">{{$s->listprice}}</span>
                                        </p>
                                        <p class="special-price">
                                            <span class="price">{{$s->priceforsale}}</span>
                                        </p>
                                    </div>
                                </div><!--end of item 1-->
                            </div><!--end of col-md-3-->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Timer Product Carousel Area-->

    <!--Featured Product Carousel Area Start-->
    <div class="featured-product-carousel-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title"><h2>FEATURED PRODUCTS</h2></div>
                </div>
            </div>
            <div class="row">
                <div class="product-carousel">
                    @foreach($feature as $f)
                    <div class="col-md-3">
                        <!--item 1 start-->
                        <div class="single-product-item">
                            <div class="single-product clearfix">
                                <a href="{{url('good/'.$f->id)}}">
                                            <span class="product-image">
                                                <img src="{{$f->good_img}}" alt=" ">
                                            </span>
                                            <span class="product-image hover-image">
                                                <img src="{{$f->good_img}}" alt=" ">
                                            </span>
                                </a>
                                <div class="button-actions clearfix">
                                    <ul class="add-to-links">
                                        <li> <a href="javascript:;" onclick="addtocart({{$f->id}})"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="quickview">
                                            <a class="btn-quickview modal-view" href="#" onclick="quickview({{$f->id}})" data-toggle="modal" data-target="#productModal">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="link-wishlist" href="javascript:;" onclick="addtowishlist({{$f->id}})">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="link-compare" href="#">
                                                <p>like</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <h2 class="single-product-name"><a href="#"> Donec ac tempus </a></h2>
                            <div class="price-box">
                                <p class="old-price">
                                    <span class="price">{{$f->listprice}}</span>
                                </p>
                                <p class="special-price">
                                    <span class="price">{{$f->priceforsale}}</span>
                                </p>
                            </div>
                        </div><!--end of item 1-->
                    </div><!--end of col-md-3-->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--End of Featured Product Carousel Area-->
    <!--Banner Area Start-->
    <div class="banner-area">
        <div class="container">
            <div class="section-padding">
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="banner-container">
                            <a href="#">
                                <img src="{{asset('resources/views/frontassets/img/banner/1.jpg')}}" alt=" ">
                            </a>
                            <div class="banner-text">
                                <h3>SHORT DUNGAREES</h3>
                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                <a href="#">View all products</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="banner-box">
                                    <a href="#">
                                        <img src="{{asset('resources/views/frontassets/img/banner/2.jpg')}}" alt=" ">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="banner-box">
                                    <a href="#">
                                        <img src="{{asset('resources/views/frontassets/img/banner/3.jpg')}}" alt=" ">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="banner-box">
                                    <a href="#">
                                        <img src="{{asset('resources/views/frontassets/img/banner/4.jpg')}}" alt=" ">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="banner-box">
                                    <a href="#">
                                        <img src="{{asset('resources/views/frontassets/img/banner/5.jpg')}}" alt=" ">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Banner Area-->
    <!--Product Carousel Area Start-->
    <div class="product-carousel-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title"><h2>New Products</h2></div>
                </div>
            </div>
            <div class="row">
                <div class="product-carousel">
                    @foreach($new as $n)
                    <div class="col-md-3">
                        <!--item 1 start-->
                        <div class="single-product-item">
                            <div class="new-product-label"><span>new</span></div>
                            <div class="single-product clearfix">
                                <a href="{{url('good/'.$n->id)}}">
                                            <span class="product-image">
                                                <img src="{{$n->good_img}}" alt=" ">
                                            </span>
                                            <span class="product-image hover-image">
                                                <img src="{{$n->good_img}}" alt=" ">
                                            </span>
                                </a>
                                <div class="button-actions clearfix">
                                    <ul class="add-to-links">
                                        <li><a href="javascript:;" onclick="addtocart({{$n->id}})" ><span><i class="fa fa-shopping-cart"></i></span></a></li>
                                        <li class="quickview">
                                            <a class="btn-quickview modal-view" href="#" onclick="quickview({{$n->id}})" data-toggle="modal" data-target="#productModal">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="link-wishlist" href="javascript:;" onclick="addtowishlist({{$n->id}})">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="link-compare" href="#">
                                                <p>like</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <h2 class="single-product-name"><a href="#">{{$n->good_name}}</a></h2>
                            <div class="price-box">
                                <p class="special-price">
                                    <span class="price">{{$n->listprice}}</span>
                                </p>
                            </div>
                        </div><!--end of item 1-->
                    </div><!--end of col-md-3-->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--End of Product Carousel Area-->
    <!--Quickview Product Start -->

    <div id="quickview-wrapper">
        <!-- productModal-->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <div class="product-images">
                                <div class="main-image images">
                                    <img id="qvimage"  src="" alt="">
                                </div>
                            </div>
                            <div class="product-info">
                                <h1 id="good_name">好的飞到天上去</h1>
                                <div class="price-box">
                                    <p class="price"><span class="special-price"><span class="amount"><p id="listprice">$132.00</p></span></span></p>
                                </div>
                                <a  id="seefeature" href=" " class="see-all">See all features</a>
                                <div class="quick-add-to-cart">

                                    <form id="tocart" action=""  method="post" class="cart">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="put">
                                        <div class="numbers-row">
                                            <input type="number" name="quantity"  maxlength="12" id="french-hens" value="0">
                                        </div>
                                        <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                    </form>



                                </div>
                                <div class="quick-desc">
                                   <p id="good_content">不买就是大爆炸</p>
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons">
                                            <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
                                            <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .product-info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function quickview(id)
        {
            $.post("{{url('/quickview/')}}/" + id, {
                '_method': 'get',
                '_token': '{{csrf_token()}}'
            }, function (data) {
                document.getElementById('qvimage').src=data.img;
                document.getElementById('listprice').innerHTML=data.listprice;
                document.getElementById('good_content').innerHTML=data.good_content;
                document.getElementById('good_name').innerHTML=data.good_name;
                document.getElementById('seefeature').href="{{url('good/')}}/"+id;
                document.getElementById('tocart').action="{{url('cart/')}}/"+id;
            });
        }
    </script>
    <!--End of Quickview Product-->
@endsection