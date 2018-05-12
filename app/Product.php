<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
      protected $table='products';


      protected $fillable = [
      'title' , 'thumbnail' , 'price' , 'size', 'color' , 'user_id' ,'brandname'
    ];


     public function user(){
     return $this->belongsTo('\App\User');
    }
     public function category(){
     return $this->hasMany('\App\Category');
    }

    public function comment(){
      return $this->hasMany('\App\Comment');
    }

    public function comments(){
      return $this->morphMany('\App\Comment' , 'commentable');
    }


}
