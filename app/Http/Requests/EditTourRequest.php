<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTourRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'images' => 'image|required',
            'number_user' => 'string|required',
            'start_date' => 'date|required',
            'end_date' => 'date|required',
            'price' => 'string|required',
            'category_id' => 'numeric|required',
        ];
    }
}
