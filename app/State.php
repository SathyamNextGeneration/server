<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['title', 'letter','iso','slug','population'];
    public $timestamps = false;

    public function cities()
    {

        return $this->hasMany(City::class);

    }
}