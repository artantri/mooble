<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyPart extends Model
{
    //
    //bikin relationship one to many dg tabel report
	public function reports()
    {
        return $this->hasMany('App\HealthReport');
    }
}
