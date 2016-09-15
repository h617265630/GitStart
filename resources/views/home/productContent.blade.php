@extends('layouts.home')

@section('info')
    <title>百舌鸟,冲动抑制</title>
    <meta name="description" content="">
    <meta name="keyword" content="">
@endsection
<!--Breadcrumb Start-->
@section('content')
<div class="breadcrumb-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><a href="{{url('/')}}">Home</a><span>/ </span></li>
                        <li><strong>Product Details</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb-->
<!--Product Details Area Start-->
<div class="product-deails-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <div class="product-details-content row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="zoomWrapper">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a href="#">
                                    <img id="zoom1" src="{{url($good->good_img)}}" data-zoom-image="img/product/20.jpg" alt="big-1">
                                </a>
                            </div>
                            <div class="product-thumb row">
                                <ul class="p-details-slider" id="gallery_01">
                                    <li class="col-md-4">
                                        <a class="elevatezoom-gallery" href="#" data-image="img/product/20.jpg" data-zoom-image="img/product/20.jpg"><img src="{{url($good->good_img)}}" alt=""></a>
                                    </li>
                                    <li class="col-md-4">
                                        <a class="elevatezoom-gallery" href="#" data-image="img/product/11.jpg" data-zoom-image="img/product/11.jpg"><img src="{{url($good->good_img)}}" alt=""></a>
                                    </li>
                                    <li class="col-md-4">
                                        <a class="elevatezoom-gallery" href="#" data-image="img/product/4.jpg" data-zoom-image="img/product/4.jpg"><img src="{{url($good->good_img)}}" alt=""></a>
                                    </li>
                                    <li class="col-md-4">
                                        <a class="elevatezoom-gallery" href="#" data-image="img/product/7.jpg" data-zoom-image="img/product/7.jpg"><img src="{{url($good->good_img)}}" alt=""></a>
                                    </li>
                                    <li class="col-md-4">
                                        <a class="elevatezoom-gallery" href="#" data-image="img/product/14.jpg" data-zoom-image="img/product/14.jpg"><img src="{{url($good->good_img)}}" alt=""></a>
                                    </li>
                                    <li class="col-md-4">
                                        <a class="elevatezoom-gallery" href="#" data-image="img/product/16.jpg" data-zoom-image="img/product/16.jpg"><img src="{{url($good->good_img)}}" alt=""></a>
                                    </li>
                                    <li class="col-md-4">
                                        <a class="elevatezoom-gallery" href="#" data-image="img/product/18.jpg" data-zoom-image="img/product/18.jpg"><img src="{{url($good->good_img)}}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="product-details-conetnt">
                            <div class="shipping">
                                <div class="single-service">
                                    <span class="fa fa-truck"></span>
                                    <div class="service-text-container">
                                        <h3>FREE SHIPPING</h3>
                                        <p>One order over $99</p>
                                    </div>
                                </div>
                                <div class="single-service">
                                    <span class="fa fa-cube"></span>
                                    <div class="service-text-container">
                                        <h3>UNLIMITED UNLIMITED</h3>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-name">
                                <h1> {{$good->good_name}}</h1>
                            </div>
                            <p class="no-rating no-margin"><a href="#">Be the first to review this product</a></p>
                            <p class="availability">Availability: <span>In stock</span></p>
                            <div class="price-box">
                                <p class="old-price">
                                    <span class="price">{{$good->listprice}}</span>
                                </p>
                                <p class="special-price">
                                    <span class="price">{{$good->priceforsale}}</span>
                                </p>
                            </div>
                            <div class="details-description">
                                <p>{{$good->good_content}}</p>
                                <img src="img/icon/social_link.png" alt="">
                            </div>
                            <div class="add-to-buttons">
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-refresh"></i></a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                </ul>
                            </div>
                            <div class="add-to-cart-qty">
                                <div class="timer">
                                    <div data-countdown="2022/01/01" class="timer-grid"></div>
                                </div>
                                <div class="cart-qty-button">
                                    <form  action="{{url('cart/'.$good->id)}}" onsubmit="successinfo()" method="post" class="wishlist-qty">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="put">
                                        <label for="qty">Qty:</label>
                                        <input type="text" class="input-text qty" value="1" maxlength="12" id="qty" name="quantity">
                                        <button class="button btn-cart" type="submit"><span>Add to Cart</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="p-details-tab">
                            <ul role="tablist" class="nav nav-tabs">
                                <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="description" href="#description">Product Description</a></li>
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="reviews" href="#reviews">Reviews</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="tab-content review product-details">
                            <div id="description" class="tab-pane active" role="tabpanel">
                                <p>{{$good->good_content}}</p>
                            </div>
                            <!--start of tabpanel review-->
                            <div id="reviews" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-5 col-md-3 col-sm-12">
                                        <div class="review-left">
                                            <p><span> Review by customers </span>
                                            <div class="review-rating">
                                                <p>price</p>
                                                <div class="rating">
                                                    <div id="pricerate"></div>
                                                    <script type="text/javascript">
                                                        $('#pricerate').raty({
                                                            hints:[null,null,null,null,null],
                                                            readOnly:true,
                                                            score:{{$pricerate}},
                                                            path:"{{asset("/resources/org/rate_master/lib/images")}}",
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="review-rating">
                                                <p>value</p>
                                                <div class="rating">
                                                    <div id="valuerate"></div>
                                                    <script type="text/javascript">
                                                        $('#valuerate').raty({
                                                            hints:[null,null,null,null,null],
                                                            readOnly:true,
                                                            score:{{$valuerate}},
                                                            path:"{{asset("/resources/org/rate_master/lib/images")}}",
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="review-rating">
                                                <p>quality</p>
                                                <div class="rating">
                                                    <div id="qualityrate"></div>
                                                    <script type="text/javascript">
                                                        $('#qualityrate').raty({
                                                            hints:[null,null,null,null,null],
                                                            readOnly:true,
                                                            score:{{$qualityrate}},
                                                            path:"{{asset("/resources/org/rate_master/lib/images")}}",
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        <div class="review-right">
                                            <h2> @foreach($errors->all() as $error)
                                                    　<li>{{$error}}</li>
                                                @endforeach</h2>
                                            <h3>You're reviewing: {{$good->good_name}}</h3>
                                            <h4>How do you rate this product? *</h4>
                                            <form method="post" action="{{url('/comment')}}"./{{$good->id}}>
                                            {{csrf_field()}}
                                                <div class="p-details-table table-responsive">
                                                    <table>
                                                        <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th><span>1 star</span></th>
                                                            <th><span>2 stars</span></th>
                                                            <th><span>3 stars</span></th>
                                                            <th><span>4 stars</span></th>
                                                            <th><span>5 stars</span></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th>Price</th>
                                                            <td><input type="radio" name="price" value="1" class="radio"></td>
                                                            <td><input type="radio" name="price" value="2" class="radio"></td>
                                                            <td><input type="radio" name="price"  value="3" class="radio"></td>
                                                            <td><input type="radio" name="price" value="4" class="radio"></td>
                                                            <td><input type="radio" name="price" value="5" class="radio"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Value</th>
                                                            <td><input type="radio" name="value" value="1" class="radio"></td>
                                                            <td><input type="radio" name="value" value="2" class="radio"></td>
                                                            <td><input type="radio" name="value"  value="3" class="radio"></td>
                                                            <td><input type="radio" name="value" value="4" class="radio"></td>
                                                            <td><input type="radio" name="value" value="5" class="radio"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Quality</th>
                                                            <td><input type="radio" name="quality" value="1" class="radio"></td>
                                                            <td><input type="radio" name="quality" value="2" class="radio"></td>
                                                            <td><input type="radio" name="quality" value="3" class="radio"></td>
                                                            <td><input type="radio" name="quality" value="4" class="radio"></td>
                                                            <td><input type="radio" name="quality" value="5" class="radio"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-top">
                                                    <div class="row">
                                                        <div id="review-form">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                                <label>Nickname<span class="required" title="required">*</span></label>
                                                                <input type="text" name="name" class="form-control">
                                                                <input type="hidden" name="good_id" value="{{$good->id}}">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                                <label>Review<span class="required" title="required">*</span></label>
                                                                <textarea name="review" class="yourmessage"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="buttons-set">
                                                    <button class="button" type="submit"><span>Submit Review</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-striped">
                                        <tr><td>name</td><td>review content</td></tr>
                                        @foreach($comments as $c)
                                            <tr><td>{{$c->name}}</td><td>{{$c->review}}</td></tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <!--end of tabpanel reivew-->
                        </div>
                    </div>
                </div>
                <div class="product-carousel-area section-top-padding">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title"><h2>Upsell Products</h2></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="upsell-product-details-carousel">
                            <div class="col-md-3">
                                <div class="single-product-item">
                                    <div class="single-product clearfix">
                                        <a href="#">
                                                    <span class="product-image">
                                                        <img src="img/product/2.jpg" alt="">
                                                    </span>
                                        </a>
                                    </div>
                                    <h2 class="single-product-name"><a href="#">Aliquam consequat</a></h2>
                                    <div class="price-box">
                                        <p class="special-price">
                                            <span class="price">$435.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="single-product-item">
                                    <div class="single-product clearfix">
                                        <a href="#">
                                                    <span class="product-image">
                                                        <img src="img/product/18.jpg" alt="">
                                                    </span>
                                        </a>
                                    </div>
                                    <h2 class="single-product-name"><a href="#">Accumsan elit </a></h2>
                                    <div class="price-box">
                                        <p class="special-price">
                                            <span class="price">$333.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="single-product-item">
                                    <div class="single-product clearfix">
                                        <a href="#">
                                                    <span class="product-image">
                                                        <img src="img/product/14.jpg" alt="">
                                                    </span>
                                        </a>
                                    </div>
                                    <h2 class="single-product-name"><a href="#">Etiam gravida</a></h2>
                                    <div class="price-box">
                                        <p class="special-price">
                                            <span class="price">$464.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="single-product-item">
                                    <div class="single-product clearfix">
                                        <a href="#">
                                                    <span class="product-image">
                                                        <img src="img/product/6.jpg" alt="">
                                                    </span>
                                        </a>
                                    </div>
                                    <h2 class="single-product-name"><a href="#"> Donec ac tempus </a></h2>
                                    <div class="price-box">
                                        <p class="old-price">
                                            <span class="price">$321.00</span>
                                        </p>
                                        <p class="special-price">
                                            <span class="price">$222.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="single-product-item">
                                    <div class="single-product clearfix">
                                        <a href="#">
                                                    <span class="product-image">
                                                        <img src="img/product/13.jpg" alt="">
                                                    </span>
                                        </a>
                                    </div>
                                    <h2 class="single-product-name"><a href="#">Primis in faucibus</a></h2>
                                    <div class="price-box">
                                        <p class="old-price">
                                            <span class="price">$122.00</span>
                                        </p>
                                        <p class="special-price">
                                            <span class="price">$100.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="single-product-item">
                                    <div class="single-product clearfix">
                                        <a href="#">
                                                    <span class="product-image">
                                                        <img src="img/product/11.jpg" alt="">
                                                    </span>
                                        </a>
                                    </div>
                                    <h2 class="single-product-name"><a href="#">Pellentesque habitant </a></h2>
                                    <div class="price-box">
                                        <p class="old-price">
                                            <span class="price">$789.00</span>
                                        </p>
                                        <p class="special-price">
                                            <span class="price">$567.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="single-products-category">
                    <div class="section-title"><h2>Related PRODUCTS</h2></div>
                    <div class="category-products">
                        <div class="product-items">
                            <div class="p-category-image">
                                <a href="#">
                                    <img alt="" src="img/product/small/8.jpg">
                                </a>
                            </div>
                            <div class="p-category-text">
                                <h2 class="category-product-name"><a href="#">Aliquam consequat</a></h2>
                                <div class="price-box">
                                    <p class="special-price">
                                        <span class="price">$345.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="product-items">
                            <div class="p-category-image">
                                <a href="#">
                                    <img alt="" src="img/product/small/9.jpg">
                                </a>
                            </div>
                            <div class="p-category-text">
                                <h2 class="category-product-name"><a href="#">Fusce aliquam</a></h2>
                                <div class="price-box">
                                    <p class="old-price">
                                        <span class="price">$324.00</span>
                                    </p>
                                    <p class="special-price">
                                        <span class="price">$123.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="product-items">
                            <div class="p-category-image">
                                <a href="#">
                                    <img alt="" src="img/product/small/10.jpg">
                                </a>
                            </div>
                            <div class="p-category-text">
                                <h2 class="category-product-name"><a href="#">Donec ac tempus </a></h2>
                                <div class="price-box">
                                    <p class="special-price">
                                        <span class="price">$324.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <div class="section-title no-margin"><h2>Popular Tags</h2></div>
                    <div class="popular-tags">
                        <ul class="tag-list">
                            <li><a href="#">Curae</a></li>
                            <li><a href="#">Vestibulum</a></li>
                            <li><a href="#">ante</a></li>
                            <li><a href="#">cubilia</a></li>
                            <li><a href="#">et</a></li>
                            <li><a href="#">faucibus</a></li>
                            <li><a href="#">in</a></li>
                            <li><a href="#">ipsum</a></li>
                            <li><a href="#">luctus</a></li>
                            <li><a href="#">orci</a></li>
                            <li><a href="#">posuere</a></li>
                            <li><a href="#">primis</a></li>
                            <li><a href="#">ultrices</a></li>
                        </ul>
                        <div class="tag-actions">
                            <a href="#">View All Tags</a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <div class="section-title no-margin"><h2>Compare Products </h2></div>
                    <div class="block-content">
                        <p class="empty">You have no items to compare.</p>
                    </div>
                </div>
                <div class="sidebar-content">
                    <div class="banner-box">
                        <a href="#"><img alt="" src="img/banner/14.jpg"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function successinfo()
    {
        layer.alert('add item to cart successfully');
    }
</script>


<!--End of Product Details Area-->
@endsection
