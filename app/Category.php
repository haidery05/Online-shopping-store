<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
      protected $table='categories';

      protected $fillable = [
      'title' , 'thumbnail', 'price' , 'size', 'color' , 'body' , 'product_id' , 'user_id'
    ];

     public function product(){
     return $this->belongsTo('\App\Product'); 
   }
     public function subcat(){
     return $this->hasMany('\App\Subcat');
    }
     public function user(){
     return $this->belongsTo('\App\User');
    }

}
