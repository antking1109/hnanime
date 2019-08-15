@extends('layouts.admin')
@section('title', $title)
@section('head.code')
@endsection
@section('content.header', $contentHeader)
@section('content.header.small', $contentHeaderSmall)
@section('breadcrumb')
@endsection
@section('active',$active)
@section('content')
{{--    Content         --}}
@if(Auth::user()->permission == 'admin')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.user.create') }}">
                        <i class="fa fa-plus"></i> <strong>Thêm mới</strong>
                    </a>
                    <div class="box-tools">
                        <form name="formSearchUser" id="formSearchUser" action="{{url()->full()}}">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control pull-right" placeholder="Tìm kiếm">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fa fa-check"></i> {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <tr>
                            <th><a id="nameOrderLink" href="{{route('admin.user.index') . "?orderby=name&order=asc"}}">Tên người dùng <i id="nameOrder" class="icon fa  fa-sort"></i></a></th>
                            <th><a id="emailOrderLink" href="{{route('admin.user.index') . "?orderby=email&order=asc"}}">Địa chỉ email <i id="emailOrder" class="icon fa  fa-sort"></i></a></th>
                            <th>Vai trò</th>
                            <th>Bài viết</th>
                            <th>Tùy chọn</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    @if($user->avatar == "")
                                        <img src="{{asset('/admin_fe/dist/img/default-50x50.gif')}}" width="50px" height="50px" />
                                    @else
                                        <img src="{{asset($user->avatar)}}" width="50px" height="50px" />
                                    @endif
                                    {{$user->name}}
                                </td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->permission == 'admin') Quản trị viên @endif
                                    @if($user->permission == 'editor')  Biên tập viên @endif
                                    @if($user->permission == 'author')  Tác giả @endif
                                </td>
                                <td>{{$user->posts()->count()}}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Sửa
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{route('admin.user.getDestroy', $user->id)}}">
                                        <i class="fa fa-trash"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="text-center">
                        {{ $users->appends(request()->input())->links() }}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Cảnh báo!</h4>
                Bạn không được quyền truy cập vào chức năng này.
            </div>
        </div>
    </div>
@endif
{{--    End Content     --}}
@endsection
@section('footer.code')
    <script>
        var orderBy = getUrlParameter('orderby');
        var order = getUrlParameter('order');
        $().ready(function () {
           if(orderBy === 'name' && order === 'asc'){
               $('#nameOrderLink').attr("href", '{{route('admin.user.index')}}'+'?orderby=name&order=desc');
               $('#nameOrder').attr('class', 'icon fa fa-sort-asc');
               $('#nameOrder').parent().mouseover(function () {
                   $('#nameOrder').attr('class', 'icon fa fa-sort-desc')
               });
               $('#nameOrder').parent().mouseout(function () {
                   $('#nameOrder').attr('class', 'icon fa fa-sort-asc')
               });
           }
            if(orderBy === 'name' && order === 'desc'){
                $('#nameOrderLink').attr("href", '{{route('admin.user.index')}}'+'?orderby=name&order=asc');
                $('#nameOrder').attr('class', 'icon fa fa-sort-desc');
                $('#nameOrder').parent().mouseover(function () {
                    $('#nameOrder').attr('class', 'icon fa fa-sort-asc')
                });
                $('#nameOrder').parent().mouseout(function () {
                    $('#nameOrder').attr('class', 'icon fa fa-sort-desc')
                });
            }
            if(orderBy === 'email' && order === 'asc'){
                $('#emailOrderLink').attr("href", '{{route('admin.user.index')}}'+'?orderby=email&order=desc');
                $('#emailOrder').attr('class', 'icon fa fa-sort-asc');
                $('#emailOrder').parent().mouseover(function () {
                    $('#emailOrder').attr('class', 'icon fa fa-sort-desc')
                });
                $('#emailOrder').parent().mouseout(function () {
                    $('#emailOrder').attr('class', 'icon fa fa-sort-asc')
                });
            }
            if(orderBy === 'email' && order === 'desc'){
                $('#emailOrderLink').attr("href", '{{route('admin.user.index')}}'+'?orderby=email&order=asc');
                $('#emailOrder').attr('class', 'icon fa fa-sort-desc');
                $('#emailOrder').parent().mouseover(function () {
                    $('#emailOrder').attr('class', 'icon fa fa-sort-asc')
                });
                $('#emailOrder').parent().mouseout(function () {
                    $('#emailOrder').attr('class', 'icon fa fa-sort-desc')
                });
            }
        });
    </script>
@endsection
