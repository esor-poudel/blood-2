<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;

class Donar extends Model 
{

  
    protected $fillable=['name','image','d_date','district_id','city_id','ph_number','birth','b_group','user_id'];
    
   


                //this defines donor is also a user
            public function user()
            {
                return $this->hasOne('App\User');
            }

                //this define which district belongs to donor 
            public function district()
            {
                return $this->hasOne('App\Distict');
            }

            //helper function
           public function getsearch($data = array())
           {
             

             
                if(isset($data['district'])==Null && isset($data['city'])==Null)
                {
                    
                    $search= Donar::where('b_group',$data)->where('approved',1)->whereMonth('d_date','>',Carbon::today()->month);
                     if(isset($data['district'])==Null && isset($data['blood'])=='A+'){
                       
                          $search= Donar::where('b_group',$data['blood'])->where('approved',1)->whereMonth('d_date','>',Carbon::today()->month);
                     }
                }
                else
                {
                   $search= Donar::where('district_id',$data['district'])->where('city_id',$data['city'])->whereMonth('d_date','>',Carbon::today()->month)->where('approved',1)->where('b_group',$data['blood']);
                   
                }
                return ($search->get());
               }
            

           
           

}
