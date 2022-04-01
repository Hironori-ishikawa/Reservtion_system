<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $list = DB::table('reservations')
        ->where('user_id')
        ->select('reservations.*')
        ->get();
        return view('admin.auth.index',['list'=>$list, 'id'=>$id]);
    }
}
