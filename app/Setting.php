<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id'];

    public function getSetting()
    {
        if ($this->setting_value) {
            return $this->setting_value;
        }

        return $this->setting_value;
    }
}
