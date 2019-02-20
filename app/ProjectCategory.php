<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProjectCategory extends Model
{
     use Sluggable;

    protected $fillable = [
        'name', 'slug','parent_id','lft','rgt','depth'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function parent(){
        return $this->belongsTo('App\ProjectCategory','parent_id');
    }
}
