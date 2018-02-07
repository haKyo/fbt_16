<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Auth;
use Session;


class UserController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        $user = Auth::user();
        
        return view('user.profile', compact('user'));
    }

    /**
     * [edit description]
     * @return [type] [description]
     */
    public function edit()
    {
        $user = Auth::user();

        return view('user.index', compact('user'));
    }

    /**
     * [update description]
     * @param  UpdateProfileRequest $request [description]
     * @return [type]                        [description]
     */
    public function update(UpdateProfileRequest $request)
    {
        try
        {
            $id = Auth::user()->id;
            $data = $request->only([
                'lastname',
                'firstname',
                'id_number',
                'phone',
                'address',
                'date_of_birth',
                'male',
            ]);
      
            User::where('id', $id)->update($data);
            Session::flash('success', trans('messages.editsuccess'));
        } catch(\Exception $e) {
            Session::flash('messages', trans('messages.notsuccess'));
        }

        return redirect()->route('profile.index');

    }
}
