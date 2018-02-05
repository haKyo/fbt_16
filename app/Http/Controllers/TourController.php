<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Review;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Helpers\Helper;
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
            
            return view('tours.index', compact('tour', 'id'));
        } catch (Exception $e) {
            Session::flash('messages', trans('messages.notfound'));

            return redirect()->back();
        }   
    }

    /**
     * [search description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    
    public function search(Request $request)
    {
        $searchs = Tour::with('category');

        if (!is_null($request->title)) {
            $keyword = $request->title;
            $searchs = $searchs->where('title' ,'LIKE' ,"%$keyword%");  
        }

        if ($request->category_id) {
            $categoryId = $request->category_id;
            $searchs = $searchs->where('category_id', $categoryId);
        }
        
        if (!is_null($request->startDate)) {
            $startDate = $request->startDate;
            $searchs = $searchs->where('start_date', $startDate);        
        }

        if (!is_null($request->price_min) && !is_null($request->price_max) ) {
            $priceMin = $request->price_min;
            $priceMax = $request->price_max;
            $searchs = $searchs->whereBetween('price', [$priceMin , $priceMax]);
        }

        $searchs = $searchs->orderBy('title', 'asc')->paginate(config('setting.home.paginate'));

        return view('tours.search', compact('searchs', 'keyword'));
    }
}
