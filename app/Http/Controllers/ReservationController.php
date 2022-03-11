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
        $id = Auth::id();
        $list = DB::table('reservations')
        ->where('user_id', Auth::user()->id)
        ->select('reservations.*')
        ->get();
        return view('reserves.reserveform',['list'=>$list, 'id'=>$id]);
    }

    public function remote()
    {
        return view('reserves.remoteform');
    }

    public function create(Request $request)
    {

    }

    public function store(ReservationRequest $request) {

        // ここで予約データ保存
        \App\Reservation::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at
        ]);
        return back()->with('result', '予約が完了しました。');
    }

    public function delete($id)
    {
        DB::table('reservations')
        ->where('id', $id)
        ->delete();

        return back();
    }
}
