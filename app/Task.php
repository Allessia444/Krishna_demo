<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     protected $fillable = [
        'name', 'task_category_id','user_id','notes','start_date','end_date','priority'
    ];

    public function task_category()
    {
        return $this->belongsTo('App\TaskCategory');
    }
     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
