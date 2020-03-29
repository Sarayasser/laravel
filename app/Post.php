<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

class Post extends Model
{   use Sluggable;
    protected $fillable=[
    	'title',
        'slug',
    	'description',
    	'user_id'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = Str::slug($value))->exists()){
            $post=static::latest()->first();
            $id=$post->id+1;
            $slug = "{$slug}-{$id}";
        }
        $this->attributes['slug'] = $slug;
    }
}
