<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verifyToken', 'dob', 'gender', 'role',
    ];

          protected $dates = [
         'dob',
         'created_at',
         'updated_at',
      ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function role(){
     return $this->belongsTo('\App\Role'); 
   }

     public function product(){
     return $this->hasMany('\App\Product');
    }

     public function category(){
     return $this->hasMany('\App\Category');
    }
     public function subcat(){
     return $this->hasMany('\App\Subcat');
    }

    public function profile(){
    return $this->hasOne('\App\Profile');
    }

    public function comment(){
    return $this->hasMany('\App\Comment');
    }

    public function review(){
    return $this->hasOne('\App\SubcatReview');
    }

}
