<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    protected $fillable=['blood_group','place','contact_name','mobile_no','email','need_date'];
}
