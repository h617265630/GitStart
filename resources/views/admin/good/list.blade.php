@extends('layouts.admin')
@section('content')
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表格</strong> / <small>Table</small></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="{{url('admin/good/create')}}"><button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button></a>
                        </div>
                    </div>
                </div>
                <div class="am-u-sm-12 am-u-md-3">
                    <div class="am-input-group am-input-group-sm">
                        <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
                    </div>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">ID</th><th class="table-title">商品名称</th>
                                <th class="table-type">商品标题</th>
                                <th class="table-date am-hide-sm-only">商品原产地</th>
                                <th class="table-date am-hide-sm-only">商品描述</th>
                                <th class="table-date am-hide-sm-only">商品原格</th>
                                <th class="table-date am-hide-sm-only">折扣价格</th>
                                <th class="table-date am-hide-sm-only">发布时间</th>
                                <th class="table-date am-hide-sm-only">到期时间</th>
                                <th class="table-date am-hide-sm-only">查看次数</th>
                                <th class="table-date am-hide-sm-only">like欢迎度</th>
                                <th class="table-date am-hide-sm-only">类别号</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($goods as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
                                    <td>{{$d->good_name}}</td>
                                    <td>{{$d->good_title}}</td>
                                    <td>{{$d->good_origin}}</td>
                                    <td class="am-hide-sm-only">{{$d->good_content}}</td>
                                    <td class="am-hide-sm-only">{{$d->listprice}}</td>
                                    <td class="am-hide-sm-only">{{$d->priceforsale}}</td>
                                    <td class="am-hide-sm-only">{{$d->dateFrom}}</td>
                                    <td class="am-hide-sm-only">{{$d->dateTo}}</td>
                                    <td class="am-hide-sm-only">{{$d->viewed}}</td>
                                    <td class="am-hide-sm-only">{{$d->like}}</td>
                                    <td class="am-hide-sm-only">{{$d->cateNo}}</td>
                                    <td>

                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href= "{{url('admin/good/'.$d->id.'/edit')}}"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button></a>
                                                <a href="javascript:;" onclick="deleteGood({{$d->id}})"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button></a>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="am-cf">
                            <div>
                                共 {{count($goods)}} 条记录
                            </div>
                            <div class="am-fr">
                                {{$goods->links()}}
                            </div>
                            <style>
                                .am-fr ul{
                                    display:inline-block;
                                    padding:0px;
                                    margin:0px;
                                }
                                .am-fr ul li{display:inline;}
                                .am-fr ul li a{
                                    color:black;
                                    padding:8px 16px;
                                    text-decoration:none;
                                    border: 1px solid #ddd;
                                }
                                .am-fr ul li span{
                                    color:black;
                                    padding:8px 16px;
                                    text-decoration:none;
                                    border: 1px solid #ddd;
                                }
                            </style>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
        </footer>
        <script>
            function deleteGood(id)
            {
                layer.confirm('Are you sure you want to delete this item?', {
                    btn: ['yes','cancel'] //按钮
                }, function(){
                    $.post("{{url('admin/good/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data)
                    {
                        if(data.status==0)
                        {
                            location.href = location.href;
                            layer.msg('delete successed',{icon:6});
                        }
                        else
                        {
                            layer.msg('delete failed',{icon:5});
                        }
                    });
                }, function(){

                });
            }
        </script>
    </div>
    <!-- content end -->

@endsection