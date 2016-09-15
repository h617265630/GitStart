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
                            <a href="{{url('admin/config/create')}}"><button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button></a>
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
                    <form action="{{url('admin/config/changeContent')}}" class="am-form" method="post">
                                    {{csrf_field()}}
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">排序</th>
                                <th class="table-id">ID</th>
                                <th class="table-type">配置名称</th>
                                <th class="table-type">配置标题</th>
                                <th class="table-author am-hide-sm-only">配置内容</th>
                                <th class="table-date am-hide-sm-only">配置提示</th>
                                <th class="table-author am-hide-sm-only">选项类型</th>
                                <th class="table-author am-hide-sm-only">选项值</th>
                                <th class="table-author am-hide-sm-only">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($configs as $c)
                                <tr>
                                    <td>
                                        <input type="text" value="{{$c->conf_order}}">
                                    </td>
                                    <td>{{$c->id}}</td>
                                    <td>{{$c->conf_name}}</td>
                                    <td>{{$c->conf_title}}</td>
                                    <td>
                                        <input type="hidden" name="id[]" value="{{$c->id}}">
                                        {!!$c->_html!!}
                                    </td>
                                    <td>{{$c->conf_tips}}</td>
                                    <td>{{$c->field_type}}</td>
                                    <td>{{$c->field_value}}</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href= "{{url('admin/config/'.$c->id.'/edit')}}"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button></a>
                                                <a href="javascript:;" onclick="deleteConfig({{$c->id}})"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button></a>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="am-f">
                            <input type="submit" value="提交保存" class="am-btn am-btn-primary am-btn-xs">
                        </div>
                    </form>
                    <div>
                        @if(count($errors)>0)
                            <div class="mark">
                                @if(is_object($errors))
                                    @foreach($errors->all() as $error)
                                        <p>{{$error}}</p>
                                    @endforeach
                                @else
                                    <p>{{$errors}}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
        </footer>
        <script>
            function deleteConfig(id)
            {
                layer.confirm('Are you sure you want to delete this config?', {
                    btn: ['yes','cancel'] //按钮
                }, function(){
                    $.post("{{url('admin/config/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data)
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