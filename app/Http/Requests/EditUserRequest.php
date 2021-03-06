<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\User;

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
    
    public function rules(Request $request)
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users,email' .$request->get('id'),
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
            'email.unique' => trans('messages.emailunique'),
            'password.same' => trans('messages.pass_confirm'),
        ];
    }
}
