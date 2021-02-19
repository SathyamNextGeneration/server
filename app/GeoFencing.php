<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeoFencing extends Model
{
    protected $dates = ['deleted_at'];

    /**
     * ServiceType Model Linked
     */
    public function service_geo_fencing()
    {
        return $this->hasOne('App\ServiceTypeGeoFencings', 'geo_fencing_id');
    }
}
