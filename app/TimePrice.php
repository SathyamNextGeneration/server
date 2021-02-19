<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimePrice extends Model
{
    protected $guarded = [];

    public function time()
    {
        return $this->hasMany('App\Time','id','time_id');
    }
    public function times()
    {
        return $this->hasOne('App\Time','id','time_id');
    }
}
