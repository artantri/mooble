<?php

namespace App\Traits;

use App\SensorData;
use App\Alert;
use Illuminate\Http\Request;

trait AlertCheckTrait
{

    protected function checkSensorData(SensorData $sdata)
    {
        if ($sdata->temperature > "38") {
            $msg = "high temperature ({$sdata->temperature} °C)";
            $this->makeAlert($sdata,$msg);
        }

        /*if ($sdata->systolic_pressure > "140" or $sdata->diastolic_pressure > "90") {
            $msg = "high blood pressure ({$sdata->systolic_pressure}/{$sdata->diastolic_pressure} mmHg)";
            $this->makeAlert($sdata,$msg);

        } elseif ($sdata->systolic_pressure < "90" or $sdata->diastolic_pressure < "60") {
            $msg = "low blood pressure ({$sdata->systolic_pressure}/{$sdata->diastolic_pressure} mmHg)";
            $this->makeAlert($sdata,$msg);
        }*/

        //caranya ngelog gimana ya?
    }

    protected function makeAlert(SensorData $sdata, $msg)
    {
        $alert = new Alert;
        //$alert->patient_id = $sdata->patient_id;
        $alert->sensor_data_id = $sdata->id;
        //$alert->doctor_id = "1"; //ini harusnya dari mana ya?
        $alert->message = $msg;
        $alert->save();
    }

}