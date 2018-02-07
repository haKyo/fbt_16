<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Helpers\Helper;
use App\Models\Category;
use App\Http\Requests\CreateTourRequest;
use App\Http\Requests\EditTourRequest;
use App\Http\Controllers\Controller;
use Session;

class TourController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    
    public function index()
    {
        $tours = Tour::orderBy('created_at', 'desc')->paginate(config('settings.paginate'));

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

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    
    public function edit($id)
    {
        try {
            $tour = Tour::findOrFail($id);
            $categories = Helper::getCategories();

            return view('admin.tour.edit', compact(['categories', 'tour']));
        } catch (Exception $e) {
            Session::flash('messages', trans('messages.notfound'));

            return redirect()->back();
        }
    }

    /**
     * [update description]
     * @param  UpdateProductRequest $request [description]
     * @param  [type]               $id      [description]
     * @return [type]                        [description]
     */
    
    public function update(EditTourRequest $request, $id)
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
            
            Tour::whereId($id)->update($data);

            Session::flash('success', trans('messages.editsuccess')); 
        } catch (Exception $e) {
            Session::flash('success', trans('messages.notsuccess')); 
        }

        return redirect()->route('tour.index'); 
    }

    /**
     * [destroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy(Tour $tour)
    {
        try {
            $tour->delete();
            Session::flash('success', trans('messages.delsuccess'));

            return redirect()->route('tour.index');
        } catch (Exception $e) {
            Session::flash('success', trans('messages.notsuccess'));

            return redirect()->back();
        }
    }
}
