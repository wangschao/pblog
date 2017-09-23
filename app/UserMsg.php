<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMsg extends Model
{
    protected $fillable = ['name','image','content'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
	
}
