<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     *Lấy tất cả thành viên với phân trang (10 bản ghi)
     */
    public function index(Request $request){
        $orderBy = $request->query('orderby');
        $order = $request->query('order');
        if(!isset($orderBy) || !isset($order)){
            $users = User::orderBy('id', 'DESC')->paginate(10);
        }else{
            if(($orderBy == 'name' || $orderBy == 'email')
                && ( $order == 'asc'   || $order == 'desc')){
                $users = User::orderBy($orderBy, $order)->paginate(10);
            }else{
                abort(404);
            }
        }
        $result = array(
            'title' => 'Thành viên',
            'contentHeader' => 'Thành viên',
            'contentHeaderSmall' => 'Danh sách thành viên',
            'active' => 'Thành viên',
            'users' => $users,
            'menu' => 'users',
            'navActive' => 'listUser',
        );
        return view('admin.user.index', compact());
    }

    public function create(){
        $result = array(
            'title' => 'Thêm thành viên',
            'contentHeader' => 'Thêm một thành viên mới',
            'active' => 'Thêm thành viên',
            'menu' => 'users',
            'navActive' => 'addUser',
        );

        return view('admin.user.add', $result);
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $user->permission = $request->role;

        $avatarPath = $request->filepath;
        $avatarPath = str_replace_first(asset('/'),"", $avatarPath);
        $user->avatar = $avatarPath;

        $user->save();
        return redirect()->route('admin.user.index')->with('success', 'Bạn đã thêm thành công một thành viên!');
    }

    public function getDestroy($id){
        $user = User::findOrFail($id);
        $result = array(
            'title' => 'Xóa thành viên',
            'userId' => $user->id,
            'userName' => $user->name,
            'userEmail' => $user->email,
        );

        return view('admin.user.destroy', $result);
    }

    public function postDestroy($id){
        User::destroy($id);

        return redirect()->route('admin.user.index')->with('success', 'Bạn đã xóa một thành viên!');
    }
}
