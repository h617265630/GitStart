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
                            <a href="{{url('admin/link/create')}}"><button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button></a>
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
                                <th class="table-id">ID</th>
                                <th class="table-title">友链名称</th>
                                <th class="table-type">友链标题</th>
                                <th class="table-author am-hide-sm-only">友链链接</th>
                                <th class="table-date am-hide-sm-only">排序</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($links as $l)
                                <tr>
                                    <td>{{$l->id}}</td>
                                    <td>{{$l->link_name}}</td>
                                    <td>{{$l->link_title}}</td>
                                    <td class="am-hide-sm-only">{{$l->link_url}}</td>
                                    <td>{{$l->link_order}}</td>
                                    <td>

                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href= "{{url('admin/link/'.$l->id.'/edit')}}"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button></a>
                                                <a href="javascript:;" onclick="deleteLink({{$l->id}})"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button></a>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 {{count($links)}} 条记录
                            <div class="am-fr">
                                {{ $links->links() }}
                            </div>
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
            function deleteLink(id)
            {
                layer.confirm('Are you sure you want to delete this Link?', {
                    btn: ['yes','cancel'] //按钮
                }, function(){
                    $.post("{{url('admin/link/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data)
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