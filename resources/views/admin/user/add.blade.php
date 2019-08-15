@extends('layouts.admin')
@section('title', $title)
@section('head.code')
    <style type="text/css">
        .table-add-user{
            width: 100%;
            max-width: 100%;
        }
        .table-add-user th{
            width: 15%;
            padding: 10px;
        }
        .table-add-user td{
            padding: 10px;
            width: 85%;
        }
    </style>
@endsection
@section('content.header', $contentHeader)
@section('content.header.small', '')
@section('breadcrumb')
    <li><a href="{{ route('admin.user.index') }}">Thành viên</a></li>
@endsection
@section('active',$active)
@section('content')
    {{--    Content         --}}
    @if(Auth::user()->permission == 'admin')
        <div class="row">
            <div class="col-md-12">
                <form role="form" name="formAddUser" id="formAddUser" method="POST">
                    @csrf
                    <table class="table-add-user table-responsive">
                        <tbody>
                            <tr>
                                <th>
                                    <label for="username" class="control-label">Họ và tên</label>
                                    <span><i>(bắt buộc)</i></span>
                                </th>
                                <td>
                                    <div class="col-md-6">
                                        <input type="text" name="username" id="username" maxlength="255" class="form-control"/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="email" class="control-label">Email</label>
                                    <span><i>(bắt buộc)</i></span>
                                </th>
                                <td>
                                    <div class="col-md-6">
                                        <input type="email" name="email" id="email" class="form-control"/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="pass" class="control-label">Mật khẩu</label>
                                    <span><i>(bắt buộc)</i></span>
                                </th>
                                <td>
                                    <div class="col-md-6">
                                        <input type="text" name="pass" id="pass" class="form-control"/>
                                    </div>
                                    <button type="button" class="btn btn-github" onclick="generate(10);">Ngẫu nhiên</button>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="role" class="control-label">Vai trò</label>
                                    <span><i>(bắt buộc)</i></span>
                                </th>
                                <td>
                                    <div class="col-md-3">
                                        <select name="role" id="role" class="form-control">
                                            <option value="">-- Chọn vai trò --</option>
                                            <option value="admin"> Quản trị viên</option>
                                            <option value="editor"> Biên tập viên</option>
                                            <option value="author">Tác giả</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        <tr>
                            <th>
                                <label for="avatar" class="control-label">Ảnh đại diện</label>
                            </th>
                            <td>
                                <div class="col-md-6">
                                    <div class="input-group">
                                       <span class="input-group-btn">
                                         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                           <i class="fa fa-picture-o"></i> Choose
                                         </a>
                                       </span>
                                        <input id="thumbnail" class="form-control" type="text" name="filepath">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <div id="holder" class="col-md-6"></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Thêm thành viên mới</button>
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
    <script>
        function generate(length) {
                charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz~!@-#$",
                retVal = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
                retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            $('#pass').val(retVal);
            $('#pass').focus();
        }
    </script>
    <script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        $('#lfm').filemanager('file');
    </script>
    <script>
        $().ready(function () {
            $('#formAddUser').validate({
                rules: {
                    username: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    pass: {
                        required: true,
                        minlength: 6,
                    },
                    role: {
                        required: true
                    },
                },
                messages: {
                    username: {
                        required: "Vui lòng nhập họ và tên.",
                    },
                    email: {
                        required: "Vui lòng nhập địa chỉ email.",
                        email: "Email nhập không đúng định dạng. (Ví dụ đúng: abc@abc.xyz).",
                    },
                    pass: {
                        required: "Vui lòng nhập mật khẩu.",
                        minlength: "Mật khẩu tối thiểu 6 ký tự.",
                    },
                    role: {
                        required: "Vui lòng chọn vai trò."
                    },
                }
            });
        });
    </script>
@endsection
