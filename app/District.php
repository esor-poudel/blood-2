<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable=['name'];
    public function city()
    {
    return $this->belongsTo('App\City');
    }
    public function donar()
    {
        return $this->belongsTo('App\Donar');
    }
}
