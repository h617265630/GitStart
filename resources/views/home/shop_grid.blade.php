@extends('layouts.home')
@section('info')

@endsection
@section('content')
        <!--Breadcrumb Start-->
        <div class="breadcrumb-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="index.html">Home</a><span>/ </span></li>
                                <li><strong>Shop Grid</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Breadcrumb-->
        <!--Banner Imgae Area Start-->
        <div class="banner-image-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="category-image"><img alt="women" src="img/banner/13.jpg"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Banner Imgae Area-->
        <!--Shop Main Area Start-->
        <div class="shop-main-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sidebar-content">
                            <div class="section-title"><h2>Category</h2></div>
                            <div class="sidebar-category-list">
                                <ul>
                                    <li><a href="#">Dresses (4)</a></li>
                                    <li><a href="#">shoes (6)</a></li>
                                    <li><a href="#">Handbags (1)</a></li>
                                    <li><a href="#">Clothing (3)</a></li>
                                </ul>
                            </div>
                            <div class="section-title border-none"><h2>Price</h2></div>
                            <div class="sidebar-category-list">
                                <div class="price_filter">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                       <div class="slider-values">
                                            <input type="text" id="amount" name="price"  placeholder="Add Your Price" /> 
                                        </div>
                                    </div>
                                    <button id="search_price" name="search_price" type="button" class="button"><span><span>Search</span></span></button>
                                </div>
                            </div>
                            <div class="section-title border-none"><h2>Manufacturer</h2></div>
                            <div class="sidebar-category-list">
                                <ul>
                                    <li><a href="#">Calvin Klein (1)</a></li>
                                    <li><a href="#">Diesel (1)</a></li>
                                    <li><a href="#">option value (1)</a></li>
                                    <li><a href="#">Polo (1)</a></li>
                                    <li><a href="#">store view (1)</a></li>
                                    <li><a href="#">Tommy Hilfiger (3)</a></li>
                                    <li><a href="#">will be used (1)</a></li>
                                </ul>
                            </div>
                            <div class="section-title border-none"><h2>Color</h2></div>
                            <div class="sidebar-category-list">
                                <ul>
                                    <li><a href="#">Black (1)</a></li>
                                    <li><a href="#">Blue (1)</a></li>
                                    <li><a href="#">Green (1)</a></li>
                                    <li><a href="#">Grey (2)</a></li>
                                    <li><a href="#">Red (2)</a></li>
                                    <li><a href="#">White (2)</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-content">
                            <div class="section-title no-margin"><h2>Compare Products </h2></div>
                            <div class="block-content">
                                <p class="empty">You have no items to compare.</p>
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
                            <div class="banner-box">
                                <a href="#"><img src="img/banner/14.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="shop-item-filter">
                            <div class="shop-tab clearfix">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs navbar-left" role="tablist">
                                    <li role="presentation" class="active"><a href="#grid" class="grid-view" aria-controls="grid" role="tab" data-toggle="tab">Grid</a></li>
                                    <li role="presentation"><a href="#list" class="list-view" aria-controls="list" role="tab" data-toggle="tab">List</a></li>
                                </ul>
                                <div class="filter-by">
                                    <h4>Short by </h4>
                                    <form action="#">
                                        <div class="select-filter">
                                            <select>
                                              <option value="color">Position</option>
                                              <option value="name">Name</option>
                                              <option value="brand">Brand</option>
                                            </select> 
                                        </div>
                                    </form>								
                                </div>
                                <p class="page floatright">Per Page</p>
                                <div class="filter-by floatright">
                                    <h4>Show </h4>
                                    <form action="#">
                                        <div class="select-filter">
                                            <select>
                                              <option value="10">12</option>
                                              <option value="20">16</option>
                                              <option value="30">20</option>
                                            </select> 
                                        </div>
                                    </form>	
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div> 
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="grid">
                                <div class="row">
                                    @foreach($good as $g)
                                    <div class="col-md-4 col-sm-4">
                                        <div class="single-product-item">



                                            <div class="single-product clearfix">
                                                <a href="{{url('good/'.$g->id)}}">
                                                    <span class="product-image">
                                                        <img src="{{$g->good_img}}" alt="">
                                                    </span>
                                                    <span class="product-image hover-image">
                                                        <img src="{{$g->good_img}}" alt="">
                                                    </span>
                                                </a>
                                                <div class="button-actions clearfix">	
                                                   <button class="button add-to-cart" type="button" onclick="addtocart({{$g->id}})">
                                                        <span><i class="fa fa-shopping-cart"></i></span>
                                                    </button>
                                                    <ul class="add-to-links">
                                                        <li class="quickview">
                                                            <a class="btn-quickview modal-view" href="#" data-toggle="modal" data-target="#productModal">
                                                                <i class="fa fa-search-plus"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="link-wishlist" href="wishlist.html">
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                        </li>																													<li>
                                                            <a class="link-compare" href="#">
                                                                <i class="fa fa-retweet"></i>
                                                            </a>
                                                        </li>										    
                                                    </ul>
                                                </div>
                                            </div>

                                            <h2 class="single-product-name"><a href="#">{{$g->good_name}}</a></h2>
                                            <div class="price-box">
                                                <p class="old-price">
                                                    <span class="price">{{$g->listprice}}</span>
                                                </p>
                                                <p class="special-price">
                                                    <span class="price">{{$g->priceforsale}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pagination-content">
                                            {{$good->links()}}
                                            <span><strong>Page: </strong></span>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    .pagination-content ul li span{
                                        padding: 4.5px 10px;
                                    }
                                </style>
                            </div>


                            <div role="tabpanel" class="tab-pane shop-list" id="list">
                                @foreach($listgood as $g)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-product-item">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-4">
                                                    <div class="single-product clearfix">
                                                        <a href="{{url('good/'.$g->id)}}">
                                                            <span class="product-image">
                                                                <img src="{{$g->good_img}}" alt="">
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-sm-8">
                                                    <h2 class="single-product-name"><a href="#">{{$g->good_name}}</a></h2>
                                                    <div class="description">
												        <p>{{$g->good_content}} 									                        <a class="learn-more" href="#">Learn More</a>
                                                    </p>
									                </div>
                                                    <div class="price-box">
                                                        <p class="special-price">
                                                            <span class="price">{{$g->listprice}}</span>
                                                        </p>
                                                    </div>
                                                    <div>
                                                    </div>
                                                    <div class="button-actions clearfix">
                                                       <button class="button add-to-cart" type="button" onclick="addtocart({{$g->id}})">
                                                            <span><i class="fa fa-shopping-cart"></i></span>
                                                        </button>
                                                        <ul class="add-to-links">
                                                            <li>
                                                                <a class="link-wishlist" href="wishlist.html">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                            </li>																													<li>
                                                                <a class="link-compare" href="#">
                                                                    <i class="fa fa-retweet"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pagination-content">
                                                {{$listgood->links()}}
                                                <span><strong>Page: </strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!--End of Shop Main Area-->
@endsection
