<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;
use Exception;
use Session;
use Hash;
use DB;

class UserController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    
    public function index()
    {
        $users = User::paginate(config('setting.paginate'));

        return view('admin.users.index', compact('users'));
    }

    /**
     * [edit description]
     * @param  User   $user [description]
     * @return [type]       [description]
     */
    
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * [update description]
     * @param  EditUserRequest $request [description]
     * @param  User            $user    [description]
     * @return [type]                   [description]
     */
    
    public function update(EditUserRequest $request, User $user)
    {
        try {
            $data = $request->only(['name', 'email']);
            $request->has('password') ? $user->password = $request->input('password') : $request->input('password');
            $user->update($data);
            Session::flash('success', trans('messages.editsuccess'));         
        } catch (Exception $e) {
            Session::flash('messages', trans('messages.erroredit'));
        }
        
        return redirect()->route('user.index');
    }

    /**
     * [destroy description]
     * @param  User   $user [description]
     * @return [type]       [description]
     */
    
    public function destroy(User $user)
    {
        try {
           $user->delete();

           return redirect()->route('user.index');
        } catch (Exception $e) {
            return back();
        }
    }
}
