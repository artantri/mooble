<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthReport extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body_id', 'pain_rate', 'pain_description', 
    ];


    //menghubungkan dengan tabel patients
	public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
	
	//menghubungkan dengan tabel body_parts
	
	public function bodypart()
    {
        return $this->belongsTo('App\BodyPart','body_id');
    }
}
