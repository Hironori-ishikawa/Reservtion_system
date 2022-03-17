<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = ['id'];

    // 予約が入っているかどうかをチェックする
    // Scope
    public function scopeWhereHasReservation($query, $start, $end) {

        // チェックしたい時間帯の中から始まる予約がある
        $query->where(function($q) use($start, $end) {

            $q->where('start_at', '>=', $start)
                ->where('start_at', '<', $end);

        })
        // チェックしたい時間帯の中で終わる予約がある
        ->orWhere(function($q) use($start, $end) {

            $q->where('end_at', '>', $start)
                ->where('end_at', '<=', $end);

        })
        // チェックしたい時間帯の中にすっぽり入る予約がある
        ->orWhere(function($q) use ($start, $end) {

            $q->where('start_at', '<', $start)
                ->where('end_at', '>', $end);

        });

    }


}
