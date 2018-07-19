<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
	public $timestamps = false;
    protected $fillable = [
    	'code',
    	'category'
    ];

    public function mapping() {
    	return $this->hasMany('App\Mapping');
    }
}
