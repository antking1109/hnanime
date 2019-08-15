<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index(){
        $result = [
            'navActive' => 'dashboard',
        ];
        return view('admin.dashboard', $result);
    }
}
