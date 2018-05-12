<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [ 'body', 'product_id' , 'user_id' ];

    public function product(){
    	return $this->belongsTo('\App\Product');
    }

    public function user(){
        return $this->belongsTo('\App\User');
    }

    public function commentable(){
    	return $this->morphTo(); 
    }
}
