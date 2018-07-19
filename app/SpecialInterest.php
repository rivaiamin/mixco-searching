<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialInterest extends Model
{
    protected $table = 'special_interest';
	public $timestamps = false;

    protected $fillable = [
    	'code',
    	'interest'
    ];

    public function mapping() {
    	return $this->hasMany('App\Mapping');
    }
}
