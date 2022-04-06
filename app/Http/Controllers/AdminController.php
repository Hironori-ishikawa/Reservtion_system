<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $list = DB::table('reservations')
        ->select('reservations.*')
        ->get();
        return view('admin.auth.index',['list'=>$list]);
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
