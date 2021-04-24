<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=['name','district_id'];
    public function district()
    {
        return $this->hasMany('App\District');
    }
}
