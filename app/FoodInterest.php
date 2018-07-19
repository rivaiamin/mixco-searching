<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodInterest extends Model
{
    protected $table = 'food_interest';
	public $timestamps = false;
    protected $fillable = [
    	'interest'
    ];
    
    public function mapping() {
    	return $this->hasMany('App\Mapping');
    }
}
