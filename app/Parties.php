<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parties extends Model
{
    protected $table = 'parties';
	public $timestamps = false;

    protected $fillable = [
    	'number'
    ];
    
    public function mapping() {
    	return $this->hasMany('App\Mapping');
    }
}
