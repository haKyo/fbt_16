<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'lastname' => 'max:255',
            'firstname' => 'max:255',
            'id_number' => 'required|max:20',
            'phone' => 'required|max:12',
            'address' => 'required|max:255',
            'male' => 'required',
            'date_of_birth' => 'required|date',
        ];
    }
}
