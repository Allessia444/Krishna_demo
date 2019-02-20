<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'email', 'password','middle_name','last_name','city','state','country','dob','address','hobby','gender'
    ];

    public function industry()
    {
        return $this->belongsTo('App\Industry','industry_id');
    }
}
