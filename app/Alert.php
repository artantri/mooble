<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    //

    public function sensor_data()
    {
        return $this->belongsTo('App\SensorData');
    }
}
