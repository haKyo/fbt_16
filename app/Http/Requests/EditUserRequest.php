<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|max:6|min:6|same:password',
        ];
    }

    /**
     * [messages description]
     * @return [type] [description]
     */
    public function messages()
    {
        return [
            'name.required' => trans('messages.userrequired'),
            'email.required' => trans('messages.emailrequired'),
            'email.email' => trans('messages.emailfalse'),
            'password.same' => trans('messages.pass_confirm'),
        ];
    }
}
