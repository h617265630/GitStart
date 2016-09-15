@extends('layouts.home')
@section('info')
    @endsection
@section('content')
        <!--Checkout Area Start-->
        <div class="checkout-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page-title">
                            <br>
                            <h1>Checkout</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!--start of userinfo/address-->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#billing">
                                            <span>1</span> SHIPPING INFORMATION
                                        </a>
                                    </h4>
                                </div>
                                <div id="billing"  role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        @if(count($userinfo)<0)
                                        <div class="login-form">

                                            <form action="{{url('/userinfo')}}" method="post">
                                                {{csrf_field()}}
                                                <div class="customer-name">
                                                    <div class="first-name">
                                                        <p>First Name<span>*</span></p>
                                                        <input type="text" required name="firstname">
                                                    </div>
                                                    <div class="last-name">
                                                        <p>Last Name<span>*</span></p>
                                                        <input type="text" required name="lastname">
                                                    </div>
                                                </div>
                                                <div class="customer-info">
                                                    <div class="email-address">
                                                        <p>Email Adress<span>*</span></p>
                                                        <input type="email" required name="email">
                                                    </div>

                                                </div>
                                                <div class="city-country">
                                                    <div class="state">
                                                        <div class="country">
                                                            <p>Country<span></span></p>
                                                            <input type="text" name="country">
                                                        </div>
                                                    </div>
                                                    <div class="state">
                                                        <p>State/Province<span>*</span></p>
                                                        <input type="text" required name="state">
                                                    </div>
                                                </div>
                                                <div class="city-country">
                                                    <div class="city">
                                                        <p>City<span>*</span></p>
                                                        <input type="text" required name="city">
                                                    </div>
                                                    <div class="street">
                                                        <p>UnitNo/street<span>*</span></p>
                                                        <input type="text" required name="street">
                                                    </div>
                                                    <div class="city">
                                                        <p>Zip/Postal Code<span>*</span></p>
                                                        <input type="text" required name="postcode">
                                                    </div>


                                                </div>

                                                <div class="customer-info">
                                                    <div class="telephone">
                                                        <p>Telephone<span>*</span></p>
                                                        <input type="text" required name="phone">
                                                    </div>
                                                </div>
                                                <div class="ship-new-address-info">
                                                 </div>

                                                <div class="buttons-set">
                                                    <button class="button" type="submit"><span>submit</span></button>
                                                </div>
                                            </form>

                                        </div>
                                        @else
                                            <div class="row" >
                                                @foreach($userinfo as $info)
                                                <div class=".col-xs-6 .col-sm-4" style="margin:10px;border:1px dashed black">
                                                    <div class="user-info" style="padding:5px">
                                                        <p><span><strong>username:</strong></span>  {{$info->username}}</p>
                                                        <p><span><strong>email:</strong></span>  {{$info->email}}</p>
                                                        <p><span><strong>phone:</strong></span>  {{$info->phone}}</p>
                                                        <p><span><strong>address:</strong></span>  {{$info->address}}</p>
                                                    </div>
                                                    <div class="ship-address">
                                                        <label>
                                                            <input type="radio" name="shipping_address" value="new-address" id="ship-new-address">Ship to different address
                                                        </label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="row" style="float:right">
                                                <a href=""><button type="button" class="btn btn-danger">add more</button></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--end of userinfo/address-->

                            <!--start of payment option menu-->
                                <br>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#payment-info">
                                            <span>2</span> PAYMENT INFORMATION
                                        </a>
                                    </h4>
                                </div>
                                <div id="payment-info"  role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <div class="ship-method payment">
                                            <div class="ship-wrap">
                                                    <div id="dropin-container"></div>
                                            </div>
                                            <div class="buttons-set">
                                                <p class="back-link"><a href="#">Back</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <script src="https://js.braintreegateway.com/js/braintree-2.27.0.min.js"></script>
                                    <script>
                                        braintree.setup("{{$clientToken}}", "dropin", {
                                            container: "dropin-container",
                                            paypal: {
                                                singleUse: true,
                                                amount:10,
                                                currency: 'USD',
                                                enableShippingAddress: true,
                                                shippingAddressOverride: {
                                                    recipientName: 'Scruff McGruff',
                                                    streetAddress: '1234 Main St.',
                                                    extendedAddress: 'Unit 1',
                                                    locality: 'Chicago',
                                                    countryCodeAlpha2: 'US',
                                                    postalCode: '60652',
                                                    region: 'IL',
                                                    phone: '123.456.7890',
                                                    editable: false
                                                }
                                            },
                                            form:"checkout-form"
                                        });
                                    </script>
                                </div>
                            </div>
                            <!--end of payment option menu-->

                            <!--start of order review-->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingSix">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#order-review">
                                            <span>3</span> ORDER REVIEW
                                        </a>
                                    </h4>
                                </div>
                                <div id="order-review"  role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                            <div class="checkout-table table-responsive">
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th class="p-name alignleft">Product Name</th>
                                                        <th class="p-amount">Price</th>
                                                        <th class="p-quantity">Qty</th>
                                                        <th class="p-total">SubTotal</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cartgood as $good)
                                                    <tr>
                                                        <td class="p-name">{{$good->good_name}}</td>
                                                        <td class="p-amount"><span class="amount">{{$good->priceforsale}}</span></td>
                                                        <td class="p-quantity">{{$good->goodQuantity}}</td>
                                                        <td class="p-total alignright">{{$good->goodQuantity*$good->priceforsale}}</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="alignright">Subtotal</td>
                                                        <td class="floatright">{{$totalprice}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="alignright">Shipping &amp; Handling (Flat Rate - Fixed)    </td>
                                                        <td class="floatright">$5.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="alignright"><strong>Grand Total</strong></td>
                                                        <td class=" alignright"><strong>{{$totalprice}}</strong></td>
                                                    </tr>
                                                    <tr>postage</tr>
                                                    </tfoot>
                                                </table>
                                                <div class="checkout-buttons">
                                                    <p class="floatleft">Forgot an Item? <a href="{{url('/cart')}}">Edit Your Cart</a>
                                                    </p>
                                                </div>
                                            </div>
                                        <input type="hidden" vlaue="amount">
                                        <input type="hidden" vlaue="amount">
                                        <input type="hidden" value="1">
                                        <form id="checkout-form" action="{{url("/pay")}}" method="post">
                                            {{csrf_field()}}
                                            <input type="image" type="submit" class="button floatright" src="https://www.sandbox.paypal.com/en_AU/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end of order review-->
                        </div>
                    </div>
                </div>

                                <!--End of Checkout Area-->
        </div>
    </div>
@endsection
