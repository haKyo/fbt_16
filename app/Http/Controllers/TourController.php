<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Review;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class TourController extends Controller
{
    /**
     * [showTourCategory description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    
    public function show($id)
    {
        try {
            $tour = Tour::with('reviewTours.user', 'category')->findOrFail($id);

            return view('tours.index', compact('tour', 'id', 'category'));
        } catch (Exception $e) {
            Session::flash('messages', trans('messages.notfound'));

            return redirect()->back();
        }   
    }
}
