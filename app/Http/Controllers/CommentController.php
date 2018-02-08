<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function comment(CommentRequest $request)
    {
        try {
            $user = auth()->user()->id;
            $data = $request->only([
                'review_id',
                'content',
                'tour_id',
            ]);
            $data['user_id'] = $user;
            Comment::create($data);
            Session::flash('success', trans('messages.addsuccess'));
        } catch (Exception $e) {
            Session::flash('messages', trans('messages.notfound'));
        }
        
        return back();
    }
}
