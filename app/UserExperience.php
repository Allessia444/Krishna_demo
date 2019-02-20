<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    protected $fillable = [
      'company', 'from','to','salary','reason'
    ];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
