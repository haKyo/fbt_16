<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Booking;


class BookingController extends Controller
{
    public function show($id)
    {
    	try {
    		$tour = Tour::with('booking')->findOrFail($id);

    		return view('booking.index',  compact('tour'));
    	} catch (Exception $e) {
    		Session::flash('messages', trans('messages.notfound'));

            return redirect()->back();
    	}
    }
}
