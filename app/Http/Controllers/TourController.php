<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Category;
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
            $tours = Tour::findOrFail($id);
            $category = Tour::with('category')->get();

            return view('tours.index', compact('tours', 'id', 'category'));
        } catch (Exception $e) {
            Session::flash('messages', trans('messages.notfound'));

            return redirect()->back();
        }   
    }
}
