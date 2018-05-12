<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
        protected $fillable = [
        'fullname', 'email', 'picture' , 'password', 'dob', 'address' , 'city' , 'province' , 'country', 'zipcode', 'user_id' , 'role_id'
    ];

    public function user(){
    	return $this->belongsTo('\App\User');
    }
     public function role(){
     return $this->belongsTo('\App\Role'); 
   }    
}
