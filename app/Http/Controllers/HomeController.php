<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::orderBy('created_at', 'asc')->paginate(config('setting.home.paginate'));
        $categories = Helper::getCategories();
        
        return view('home', compact('tours', 'categories'));
    }
}
