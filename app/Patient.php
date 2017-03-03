<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NIK','name', 'email', 'password','salt', 'phone_number', 'username',
        'address','gender','blood_type', 'birth_date', 'weight', 'height',
        'job', 'job_description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','salt', 'remember_token',
    ];

    //bikin relationship one to many dg tabel report
	public function reports()
    {
        return $this->hasMany('App\HealthReport');
    }
	
	//bikin relationship one to many dg tabel diagnosis
	public function diagnoses()
    {
        return $this->hasMany('App\Diagnosis');
    }

    public function sensor_data()
    {
        return $this->hasMany('App\SensorData');
    }
}
