 @extends('layouts.home')
        @section('info')
            @endsection
        @section('content')
        <!--Wishlist Area Start-->
        <div class="wishlist-concept area-padding">
			<div class="container">
                <br>
                <br>
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<div class="section-title no-margin"><h2>My Account</h2></div>
						<aside>
							<div class="wishlist-left-sidebar">
								<ul>
									<li><a href="#">Account Dashboard</a></li>
									<li><a href="#">Account Information</a></li>
									<li><a href="#">Address Book</a></li>
									<li><a href="#">My Orders</a></li>
									<li><a href="#">Billing Agreements</a></li>
									<li><a href="#">Recurring Profiles</a></li>
									<li><a href="#">My Product Reviews</a></li>
									<li><a href="#">My Tags</a></li>
									<li><a href="wishlist.html">My Wishlist</a></li>
									<li><a href="#">My Applications</a></li>
									<li><a href="#">My Downloadable Products</a></li>
								</ul>
							</div>
						</aside>
					</div>
					<div class="col-sm-12 col-lg-9 col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <h1>My Wishlist</h1>
                                </div>
                            </div>
                        </div>
						<div class="table-responsive">
							<table class="cart-table">
								<thead>
									<tr>
										<th class="product-img">Product Image</th>
										<th>Product Details and Comment</th>
										<th class="text-center add-cart-info">Add to Cart</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($wishlist as $w)
									<tr>
										<td class="product-img">
											<a href="{{url('good/'.$w->id)}}" class="tb-img"><img src="{{$w->good_img}}" class="img-responsive" alt=""></a>
										</td>
										<td>
											<h6><a href="product-details.html">{{$w->good_name}}</a></h6>
											<p>{{$w->good_content}}</p>
										</td>
										<td class="text-center add-cart-info">
											<div class="price-box">
												<span class="old-price">{{$w->listprice}}</span>
												<span class="special-price">{{$w->priceforsale}}</span>
											</div>
											<form  action="{{url('cart/'.$w->id)}}" onsubmit="successinfo()" method="post" class="wishlist-qty">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="put">
												<input type="text" name="quantity" value="{{$w->goodQuantity}}" maxlength="12">
												<button class="button btn-cart" type="submit"><span>Add to Cart</span></button>
                                            </form>
										</td>
                                            <td class="p-action" ><a href="{{url('removewish/'.$w->id)}}"></a></td>
									</tr>
								    @endforeach
								</tbody>
							</table>
						</div>
                        <div class="all-cart-buttons">
                            <button class="button btn-cart" type="button"><span>Share Wishlist</span></button>
                            <button class="button btn-cart" type="button"><span>Add all to Cart</span></button>
                            <button class="button btn-cart" type="button"><span>update wishlist</span></button>
                        </div>
						<div class="back-button">
							<a href="#"><small>« </small> Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!--End of Wishlist Area-->
            <script>
                function successinfo()
                {
                    layer.alert('add item to cart successfully');
                }
            </script>
      @endsection