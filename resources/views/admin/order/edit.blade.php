@extends('layouts.admin')
@section('content')

    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg">订单管理</strong> /
                    <small>编辑订单</small>
                </div>
            </div>

            <hr>

            <div class="am-tabs am-margin" data-am-tabs>
                <ul class="am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active">编辑订单</li>
                    <br>　　　　　
                    @foreach($errors->all() as $error)
                        　<li>{{$error}}</li>
                    @endforeach
                </ul>

                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                        <form class="am-form"  action="{{url('admin/order/'.$order['id'])}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    订单号
                                </div>
                                <div class="am-u-sm-8 am-u-md-4">
                                    <input type="text" name="orderNo" value="{{$order['orderNo']}}" class="am-input-sm">
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填</div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    买家号
                                </div>
                                <div class="am-u-sm-8 am-u-md-4">
                                    <input type="text" name="buyerNo"   value="{{$order['buyerNo']}}"class="am-input-sm">
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填</div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    运单号
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text"  name="postageNo"  value="{{$order['postageNo']}}" class="am-input-sm">
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填</div>
                            </div>

                            <div class="am-g am-margin-top-sm">
                                <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                                    货物状态
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text"  name="deliveryStatus"  value="{{$order['deliverStatus']}}" class="am-input-sm" >
                                </div>
                            </div>

                            <div class="am-g am-margin-top-sm">
                                <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                                    总价结算
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text"  name="orderSummary"  value="{{$order['orderSummary']}}" class="am-input-sm" >
                                </div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    结算方式
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text"  name="paymentMethod"  value="{{$order['paymentMethod']}}" class="am-input-sm" >
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填</div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    联系号码
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text"  name="contact"  value="{{$order['contact']}}" class="am-input-sm" >
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填</div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    结算地址
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text"  name="billingAddress"  value="{{$order['billingAddress']}}" class="am-input-sm" >
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填</div>
                            </div>


                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-8 am-u-md-4" style="float:left">
                                    <input type="submit" value="提交保存" class="am-btn am-btn-primary am-btn-xs">
                                    <input type="submit" value="返回" onclick="history.go(-1)" class="am-btn am-btn-primary am-btn-xs">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
        </footer>
    </div>
    <!-- content end -->
@endsection