<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
	public $timestamps = false;

    protected $fillable = [
    	'title',
    	'filename'
    ];
    
    public function mapping() {
    	return $this->hasMany('App\Mapping');
    }
}
