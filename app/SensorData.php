<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    //
    protected $table = 'sensor_data';

    public function alert()
    {
        return $this->hasOne('App\Alert');
    }
}
