<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcatReview extends Model
{
    //
    protected $fillable=[
        'headline' , 'description' , 'rating' , 
    ];

    public function user(){
    	return $this->belongsTo('\App\User');
    }

    public function subcat(){
    	return $this->belongsTo('\App\Subcat');
    }
}
