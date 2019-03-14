<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sluggable;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
