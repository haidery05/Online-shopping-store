<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
    //    

    use Rateable;

    protected $fillable = [
      'title' , 'thumbnail' , 'price' , 'size', 'color' , 'body' , 'category_id' , 'user_id'
    ];

    public function category(){
    	return $this->belongsTo('\App\Category');
    }

    public function user(){
        return $this->belongsTo('\App\User');
    }

    public function subcatreview(){
        return $this->hasMany('\App\SubcatReview');
    }

}
