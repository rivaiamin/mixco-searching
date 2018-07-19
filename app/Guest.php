<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guest';

    protected $fillable = [
    	'name',
    	'gender',
    	'age',
    	'nationality',
    	'email',
    	'phone'
    ];
}
