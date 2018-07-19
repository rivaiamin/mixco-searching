<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
    protected $table = 'mapping';

    protected $fillable = [
    	'province_id',
    	'category_id',
    	'special_interest_id',
    	'seasonality_id',
    	'budget_id',
    	'parties_id',
    	'food_interest_id',
    	'video_id'
    ];

    public function budget() {
    	return $this->belongsTo('App\Budget');
    }
    public function category() {
    	return $this->belongsTo('App\Category');
    }
    public function foodInterest() {
    	return $this->belongsTo('App\FoodInterest');
    }
    public function parties() {
    	return $this->belongsTo('App\Parties');
    }
    public function province() {
    	return $this->belongsTo('App\Province');
    }
    public function Seasonality() {
    	return $this->belongsTo('App\Seasonality');
    }
    public function specialInterest() {
    	return $this->belongsTo('App\SpecialInterest');
    }
    public function Video() {
    	return $this->belongsTo('App\Video');
    }

}
