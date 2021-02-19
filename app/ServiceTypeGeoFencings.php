<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceTypeGeoFencings extends Model
{
    protected $guarded = [];
    protected $table='service_types_geo_fencings';
    public function geo_fencing()
    {
        return $this->belongsTo('App\GeoFencing','geo_fencing_id');
    }
}
