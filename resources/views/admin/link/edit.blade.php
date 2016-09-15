@extends('layouts.admin')
@section('content')

    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg">友链管理</strong> /
                    <small>编辑友情链接</small>
                </div>
            </div>

            <hr>

            <div class="am-tabs am-margin" data-am-tabs>
                <ul class="am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active">编辑友情链接</li>
                    <br>　　　　　
                    @foreach($errors->all() as $error)
                        　<li>{{$error}}</li>
                    @endforeach
                </ul>

                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                        <form class="am-form"  action="{{url('admin/link/'.$link['id'])}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    友链名称
                                </div>
                                <div class="am-u-sm-8 am-u-md-4">
                                    <input type="text" name="link_name" value="{{$link['link_name']}}" class="am-input-sm">
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填</div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    友链标题
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text"  name="link_title"  value="{{$link['link_title']}}" class="am-input-sm">
                                </div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    友链链接
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text"  name="link_url" value="{{$link['link_url']}}" class="am-input-sm">
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填</div>
                            </div>


                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    排序
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text"  name="link_order" value="{{$link['link_order']}}" class="am-input-sm" >
                                </div>
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
