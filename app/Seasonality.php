<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seasonality extends Model
{
    protected $table = 'seasonality';
	public $timestamps = false;

    protected $fillable = [
    	'seasonality'
    ];
    
    public function mapping() {
    	return $this->hasMany('App\Mapping');
    }
}
