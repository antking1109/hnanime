@extends('layouts.admin')
@section('title', $title)
@section('head.code')
@endsection
@section('content.header', $title)
@section('content.header.small', '')
@section('breadcrumb')
    <li><a href="{{ route('admin.user.index') }}">Thành viên</a></li>
@endsection
@section('active',$title)
@section('content')
    {{--    Content         --}}
    @if(Auth::user()->permission == 'admin')
        <div class="row">
            <div class="col-md-12">
                <form role="form" name="formDestroyUser" method="POST">
                    @csrf
                    <p>Bạn thực sự muốn xóa người dùng có thông tin như sau:</p>
                    <p>ID: {{$userId}} | Tên: {{$userName}} | Email: {{$userEmail}}</p>
                    <a href="{{route('admin.user.index')}}" class="btn btn-default"> Quay lại</a>
                    <input type="submit" value="Xác nhận xóa" class="btn btn-primary">
                </form>
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
@endsection
