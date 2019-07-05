<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function post()
    {
        return $this->hasMany(Artikel::class);
    }


    public function getName()
    {
        if ($this->name) {
            return $this->name;
        }

        return $this->name;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
