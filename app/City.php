<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['title', 'state_id','lat','longi','status','slug'];


    public $timestamps = false;

    public function state(Type $var = null)
    {
        # code...
       
            return $this->belongsTo('App\State', 'state_id', 'id');
    
    }
}
