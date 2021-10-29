<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable=['name'];
   
    public function donar()
    {
        return $this->belongsTo('App\Donar');
    }
    public function city()
    {
        return $this->hasOne('App\City','district_id','id');
    }
}
