<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
	public $timestamps = false;
    protected $fillable = [
    	'province'
    ];

    public function mapping() {
    	return $this->hasMany('App\Mapping');
    }
}
