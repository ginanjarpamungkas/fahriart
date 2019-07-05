<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $guarded = ['id'];

    public function artikel()
    {
        return $this->hasOne(Artikel::class);
    }
}
