<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'diagnoses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_id', 'patient_id', 'diagnose_result', 'treatment', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    //menghubungkan dengan tabel patients
	public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
	
	//menghubungkan dengan tabel doctors
	public function doctor()
    {
        return $this->belongsTo('App\User');
    }


    
}
