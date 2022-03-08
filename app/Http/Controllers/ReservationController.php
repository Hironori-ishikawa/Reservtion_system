<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReservationRequest;

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

    public function create(Request $request)
    {
        $reserve = $request->input('newReserve');
        DB::table('reservations')->insert([
            'id' => Auth::id(),
            'title' => $title(),
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'created_at' => now(),
            'update_at' => now()
        ]);
        return view('reserves.reserve');

    }

    public function store(ReservationRequest $request) {

        // ここで予約データ保存
        \App\Reservation::create([
            'id' => $request->_id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at
        ]);
        return back()->with('result', '予約が完了しました。');
    }
}
