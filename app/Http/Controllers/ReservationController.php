<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reserves.index');
    }

    public function reserve()
    {
        return view('reserves.reserve');
    }

    public function remote()
    {
        return view('reserves.remote');
    }
}
