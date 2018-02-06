<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookingRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'integer|unique:bookings',
            'tour_id' => 'integer',
            'depart_day' => 'date',
            'status' => 'boolean',
        ];
    }


    public function messages()
    {
        return [
            'user_id.unique' => 'You have booked a tour !',
        ];
    }
}
