<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $fillable=['name','start_date','end_date','ph_number','email','venue','organizer','location'];
}
