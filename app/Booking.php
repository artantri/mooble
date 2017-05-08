<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bookings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_id', 'doctor_id', 'patient_id', 'request_session', 'request_date',
         'appoint_number', 'appoint_time', 'status', 'status_decline' 
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

	//menghubungkan dengan tabel staffs
	public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

}
