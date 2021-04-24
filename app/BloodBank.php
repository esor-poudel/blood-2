<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    protected $fillable=['name','blood_type','blood_pint'];
}
