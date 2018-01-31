<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Helpers\Helper;
use App\Models\Category;
use App\Http\Requests\CreateTourRequest;
use Session;

class TourController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    
    public function index()
    {
        $tours = Tour::paginate(config('settings.paginate'));

        return view('admin.tour.index', compact('tours'));
    }

 	/**
 	 * [create description]
 	 * @return [type] [description]
 	 */
    public function create()
    {
        $categories = Helper::getCategories();

        return view('admin.tour.create', compact('categories'));
    }

    /**
     * [store description]
     * @param  CreateTourRequest $request [description]
     * @return [type]                     [description]
     */
    
    public function store(CreateTourRequest $request)
    {
        try {
            $data = $request->only([
                'title',
                'description',
                'number_user',
                'start_date',
                'end_date',
                'price',
                'category_id',
            ]);

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $data['images'] = Helper::upload($file, 'images');
            }
            
            Tour::create($data);

            Session::flash('success', trans('messages.addsuccess')); 
        } catch (Exception $e) {
            Session::flash('success', trans('messages.notsuccess')); 
        }

        return redirect()->route('tour.index'); 
    }
}
