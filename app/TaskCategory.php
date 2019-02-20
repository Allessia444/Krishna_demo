<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class TaskCategory extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug'
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
     protected $table = 'task_categories';
}
