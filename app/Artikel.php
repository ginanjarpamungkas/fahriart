<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Auth;


class Artikel extends Model
{
    protected $guarded = ['id'];
    use Sluggable;

    public function sluggable()
    {
        return [
        'slug' => [
            'source' => 'title'
         ]
      ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function galery()
    {
        return $this->hasMany(Galery::class,'artikel_id');
    }

}
