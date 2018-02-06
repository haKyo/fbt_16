<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Booking;
use App\Models\User;
use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\UpdateStatusBookingRequest;
use Session;

class BookingController extends Controller
{   

    public function showDetail($id)
    {
        try {
            $booking = Booking::with('tour')->findOrFail($id);

            $user = Auth()->user();
            
            return view('booking.detail', compact('booking', 'user'));
        } catch (Exception $e) {
            Session::flash('messages', trans('messages.notfound'));

            return redirect()->back();
        }
    }
    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    
    public function show($id)
    {
        try {
            $tour = Tour::with('booking')->findOrFail($id);
            $user = Auth()->user();
            
            return view('booking.index',  compact('tour', 'user'));
        } catch (Exception $e) {
            Session::flash('messages', trans('messages.notfound'));

            return redirect()->back();
        }
    }

    /**
     * [store description]
     * @return [type] [description]
     */
    
    public function store(CreateBookingRequest $request)
    {
        try {
            $data = $request->only([
                'status',
                'depart_day',
                'user_id',
                'tour_id',
            ]);
            
            $booking = Booking::create($data);
            Session::flash('success', trans('messages.add'));

            return redirect()->route('booking.detail', ['id' => $booking->id]);
        } catch (Exception $e) {
            return redirect()->back();
        }    
    }

    /**
     * [update description]
     * @param  UpdateStatusBookingRequest $request [description]
     * @param  [type]                     $id      [description]
     * @return [type]                              [description]
     */
    
    public function update(UpdateStatusBookingRequest $request, $id)
    {
        try {
            $data = $request->only([
                'status',
            ]);
            
            $booking = Booking::whereId($id)->update($data);

            Session::flash('success', trans('messages.update_success')); 
        } catch (Exception $e) {
            Session::flash('messages', trans('messages.notsuccess')); 
        }

        return redirect()->route('booking.detail', ['id' => $id]); 
    }

    /**
     * [destroy description]
     * @param  User   $user [description]
     * @return [type]       [description]
     */
    
    public function destroy(Booking $booking)
    {
        try {
            $booking->delete();
            Session::flash('success', trans('messages.booking_success'));

            return redirect()->route('user.index');
        } catch (Exception $e) {
            Session::flash('messages', trans('messages.notsuccess')); 

            return redirect()->back();
        }
    }
}
