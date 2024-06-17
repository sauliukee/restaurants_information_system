<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'res_date' => ['required', 'date', new DateBetween(), new TimeBetween()],
            'tel_number' => ['required'],
            'table_id' => ['required', 'exists:tables,id'],
            'guest_number' => ['required', 'integer', 'min:1'],
            'restaurant_id' => 'required|exists:restaurants,id',
        ];
    }
}
