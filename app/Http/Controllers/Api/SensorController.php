<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\SensorData;
use Illuminate\Http\Request;

use App\Patient;

//buat ngecek abnormal data
use App\Traits\AlertCheckTrait;

class SensorController extends Controller
{
    use AlertCheckTrait;

    public function store(Request $request)
    {
        //
        $sdata = new SensorData;
        $sdata->patient_id = $request->get('id');
        $sdata->temperature = $request->get('te');
        $sdata->heart_rate = $request->get('hr');
        //$sdata->systolic_pressure = $request->get('sp');
        //$sdata->diastolic_pressure = $request->get('dp');
        $sdata->save();

        //check for abnormal data pake fungsi dari trait
        $this->checkSensorData($sdata);
        
        return response($sdata, 201);
    }
}