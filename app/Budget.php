<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budget';
	public $timestamps = false;
    protected $fillable = [
    	'budget'
    ];

    public function mapping() {
    	return $this->hasMany('App\Mapping');
    }
}
