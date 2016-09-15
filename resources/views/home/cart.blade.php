﻿@extends('layouts.home')
@section('info')
    @endsection
@section('content')
        <!--Cart Main Area Start-->
        <div class="cart-main-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <br>
                            <h1>Shopping Cart</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <form class="am-form"  action="{{url('/updatecart')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="cart-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="p-image">Product Image</th>
                                            <th class="p-name">Product Name</th>
                                            <th class="p-edit"></th>
                                            <th class="p-price">Unit Price</th>
                                            <th class="p-quantity">Quantity</th>
                                            <th class="p-total">SubTotal</th>
                                            <th class="p-times"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($itemInCart as $item)
                                        <tr>
                                            <td class="p-image">
                                                <a href="{{url('good/'.$item->id)}}"><img alt="" src="{{$item->good_img}}" class="floatleft"></a>
                                                <input type="hidden" name="id[]" value="{{$item->item_id}}">
                                            </td>
                                            <td class="p-name"><a href="product-details.html">{{$item->good_name}}</a></td>
                                            <td class="edit"></td>
                                            <td class="p-amount">{{$item->listprice}}</td>
                                           <td class="p-quantity"><input maxlength="12" style="color:orangered" type="text" value="{{$item->goodQuantity}}" name="goodQuantity[]"></td>
                                            <td class="p-total">{{$item->goodQuantity*$item->listprice}}</td>
                                            <td class="p-action"><a href="{{url('/remove/'.$item->id)}}"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                <div class="all-cart-buttons">
                                    <div>
                                        <br>
                                        {{$error}}
                                    </div>
                                    <br>
                                    <br>
                                    <button class="button" type="button" onclick="history.go(-1)"><span>Continue Shopping</span></button>
                                    <div class="floatright">
                                        <a href="{{url('/clearcart')}}"><button class="button clear-cart" type="button"><span>Clear Shopping Cart</span></button></a>
                                       <button class="button" type="submit"><span>Update Shopping Cart</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="shipping-discount">
                                        <div class="shipping-title">
                                            <h3>Estimate Shipping And Tax</h3>
                                        </div>
                                        <p>Enter your destination to get shipping &amp; tax</p>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-6">
                                                <div class="level">
                                                    Country <span class="required">*</span>
                                                </div>
                                                <div class=" shipping-wrapper">
                                                  <select class="country">
                                                    <option value="state">Select options</option>
                                                    <option value="state">Bahasa Indonesia</option>
                                                    <option value="state">Bahasa Melayu</option>		
                                                    <option value="state">Deutsch (Deutschland)</option>		
                                                    <option value="state">English (Australia)</option>		
                                                    <option value="state">English (Canada)</option>		
                                                    <option value="state">English (India)</option>		
                                                    <option value="state">English (Ireland)</option>		
                                                    <option value="state">English (Maktoob)</option>		
                                                    <option value="state">English (Malaysia)</option>		
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-6">
                                                <div class="level">
                                                    State/Province
                                                </div>
                                                <div class=" shipping-wrapper">
                                                  <select class="country">
                                                    <option value="state">Select options</option>
                                                    <option value="state">South Carolina</option>
                                                    <option value="state">South Dakota</option>
                                                    <option value="state">Tennessee</option>		
                                                    <option value="state">Texas</option>		
                                                    <option value="state">Utah</option>		
                                                    <option value="state">Vermont</option>		
                                                    <option value="state">Virginia</option>		
                                                    <option value="state">Washington</option>		
                                                    <option value="state">West Virginia</option>		
                                                    <option value="state">Wyoming</option>		
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="postal-code">
                                                    <div class="level">
                                                        Zip / Postal Code 
                                                    </div>
                                                    <input type="text" placeholder="" name="zip-code">
                                                </div>
                                                <div class="buttons-set">
                                                    <button class="button" type="button"><span>Get a Quote</span></button>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="shipping-discount">
                                        <div class="shipping-title">
                                            <h3>Discount Code</h3>
                                        </div>
                                        <p>Enter your coupon code if you have one</p>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="postal-code">
                                                    <input type="text" placeholder="">
                                                </div>
                                                <div class="buttons-set">
                                                    <button class="button" type="button"><span>Apply Coupon</span></button>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="amount-totals">
                                        <p class="total">Subtotal <span>{{$totalprice}}</span></p>
                                        <p class="total">Grandtotal <span>{{$totalprice}}</span></p>
                                        <a href="{{url('/checkout')}}"><button class="button" type="button"><span>Check Out</span></button></a>
                                        <div class="clearfix"></div>
                                        <p class="floatright">Checkout with multiples address</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Cart Main Area-->
        @endsection