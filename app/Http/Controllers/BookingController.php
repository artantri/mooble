<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//untuk query builder
//use Illuminate\Support\Facades\DB;

use App\Booking;
use App\Patient;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($patient_id)
    {
        //return DB::table('bookings')->get();
        return Patient::findOrFail($patient_id)->bookings->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $patient_id)
    {
        //
        $booking = new Booking;
        $booking->patient_id = $patient_id;
        $booking->doctor_id = $request->input('doctor_id');
        $booking->staff_id = $request->input('staff_id');
        $booking->request_session = $request->input('request_session');
        $booking->request_date = $request->input('request_date');
        // $booking->appoint_number = '0';
        // $booking->appoint_time = '00:00:00';
        // $booking->status = '';
        // $booking->status_decline = '';
        
        $booking->save();
        
        return response($booking, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($patient_id, $booking_id)
    {
        return Patient::findOrFail($patient_id)->bookings()->findOrFail($booking_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $booking = new Booking;
        $booking->patient_id = $patient_id;
        $booking->doctor_id = $request->input('doctor_id');
        $booking->staff_id = $request->input('staff_id');
        $booking->request_session = $request->input('request_session');
        $booking->request_date = $request->input('request_date');
        $booking->appoint_number = $request->input('appoint_number');
        $booking->appoint_time = $request->input('appoint_time');
        $booking->status = $request->input('status');
        $booking->status_decline = $request->input('status_decline');
        
        $booking->save();
        
        return response($booking, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
