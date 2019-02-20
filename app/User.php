<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'department_id','designation_id','role','email', 'password','middle_name','last_name','active','team_lied'
    ];

    public function age() {
        return $this->dob->diffInYears(\Carbon::now());
    }

    public function getDobDateAttribute($value)
    {
        return date("d-m-Y", strtotime($value));
    }

    public function setDobDateAttribute($value)
    {
        $this->attributes['dob'] = date("Y-m-d", strtotime($value));
    }
    public function department()
    {
        return $this->belongsTo('App\Department','department_id');
    }
    public function designation()
    {
        return $this->belongsTo('App\Designation','designation_id');
    }
    public function user_profile()
    {
        return $this->hasOne('App\UserProfile');
    }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
