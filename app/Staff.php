<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class Staff extends Model
class Staff extends Authenticatable
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'staffs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'contact', 'username', 'is_approved'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
