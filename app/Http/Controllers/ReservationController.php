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
        $id = Auth::id();
        $list = DB::table('reservations')
        ->where('user_id', Auth::user()->id)
        ->select('reservations.*')
        ->get();
        return view('reserves.remoteform',['list'=>$list, 'id'=>$id]);
    }

    public function create(Request $request)
    {

    }

    // 保存
    // $check 同titleで同じ時間での検索をかける
    // if($check<3) 3人以内であればcreate実行
    public function store(ReservationRequest $request) {

        $check = \App\Models\Reservation::where('title',$request->title)
            ->whereBetween('start_at',[$request->start_at,$request->end_at])
            ->whereBetween('end_at',[$request->start_at,$request->end_at])
            ->count();

        if($check<3){
            \App\Models\Reservation::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at
            ]);
            return back()->with('result','予約が完了しました。');
        }else{
            return back()->with('result','予約がいっぱいで予約できません......。');
        }
    }

    // 予約削除
    public function delete($id)
    {
        DB::table('reservations')
        ->where('id', $id)
        ->delete();

        return back();
    }
}
