@extends('layouts.admin')
@section('content')

    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg">分类管理</strong> /
                    <small>编辑分类</small>
                </div>
            </div>

            <hr>

            <div class="am-tabs am-margin" data-am-tabs>
                <ul class="am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active">编辑分类</li>
                    <br>　　　　　
                    @foreach($errors->all() as $error)
                        　<li>{{$error}}</li>
                    @endforeach
                </ul>

                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                        <form class="am-form"  action="{{url('admin/cate/'.$cat['id'])}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">所属类别</div>
                                <div class="am-u-sm-8 am-u-md-10">
                                    <select data-am-selected="{btnSize: 'sm'}" name="cate_pid">
                                        <option value="">==父级分类</option>
                                        <option value=1>选项二</option>
                                        <option value=2>选项三</option>
                                    </select>
                                </div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    分类名称
                                </div>
                                <div class="am-u-sm-8 am-u-md-4">
                                    <input type="text" name="cate_name" class="am-input-sm" value="{{$cat['cate_name']}}">
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    分类标题
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text"  name="cate_title" class="am-input-sm" value="{{$cat['cate_title']}}">
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填</div>
                            </div>

                            <div class="am-g am-margin-top-sm">
                                <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                                    关键词
                                </div>
                                <div class="am-u-sm-12 am-u-md-10">
                                    <textarea rows="10" name="cate_keyword" placeholder="请输入关键词">{{$cat['cate_keyword']}}</textarea>
                                </div>
                            </div>

                            <div class="am-g am-margin-top-sm">
                                <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                                    描述
                                </div>
                                <div class="am-u-sm-12 am-u-md-10">
                                    <textarea rows="10" name="cate_description" placeholder="请输入描述">{{$cat['cate_description']}}</textarea>
                                </div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    排序
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text"  name="cate_order" class="am-input-sm" value="{{$cat['cate_order']}}">
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
