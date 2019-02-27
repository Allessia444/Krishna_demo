<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BlogCategory extends Model
{
     use Sluggable;

    protected $fillable = [
        'name', 'slug','parent_id'
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

    public function parent(){
        return $this->belongsTo('App\BlogCategory','parent_id');
    }

    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }
     
}
