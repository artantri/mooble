<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\SensorData;
use Illuminate\Http\Request;

use App\Patient;

use App\Traits\AlertCheckTrait;

class PatientSensorController extends Controller
{
    use AlertCheckTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($patient_id)
    {
        //
        //return Patient::findOrFail($patient_id)->sensor_data->all();

        $ps = Patient::findOrFail($patient_id)->sensor_data->all();
        // $returnData = array(
        //     'status' => 'success',
        //     'sensor_data' => $ps
        // );
        // return response()->json($returnData, 200);
        return $ps;

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
        $sdata = new SensorData;
        $sdata->patient_id = $patient_id;
        $sdata->temperature = $request->input('temperature');
        $sdata->systolic_pressure = $request->input('systolic_pressure');
        $sdata->diastolic_pressure = $request->input('diastolic_pressure');
        $sdata->save();

        //check for abnormal data pake fungsi dari trait
        $this->checkSensorData($sdata);
        
        return response($sdata, 201);
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
