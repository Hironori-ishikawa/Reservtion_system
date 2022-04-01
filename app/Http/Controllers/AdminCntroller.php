<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCntroller extends Controller
{
    public function index()
    {
        return view('admin.auth.index');
    }
}
