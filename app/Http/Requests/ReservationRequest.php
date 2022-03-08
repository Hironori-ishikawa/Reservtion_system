<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\ReservationRule;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function all($keys = null)
    {
        $results = parent::all($keys);
        $results['start_at'] = $results['start_date'] .' '. $results['start_time'];
        $results['end_at'] = $results['end_date'] .' '. $results['end_time'];
        return $results;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'id' => 'required',
            'title' => 'required',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
            'start_at' => [
                new ReservationRule(
                    $this->id, //
                    $this->title,
                    $this->start_at, // 開始日時
                    $this->end_at // 終了日時
            )
        ]
    ];
    }
}
