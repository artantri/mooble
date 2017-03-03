<?php

namespace App\Http\Controllers;

use App\SensorData;
use Illuminate\Http\Request;

use App\Patient;


class PatientSensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($patient_id)
    {
        //
        return Patient::findOrFail($patient_id)->sensor_data->all();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function show(SensorData $sensorData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function edit(SensorData $sensorData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SensorData $sensorData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function destroy(SensorData $sensorData)
    {
        //
    }
}
