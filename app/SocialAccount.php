<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
	protected $fillable = ['provider', 'provider_id'];

    function user(){
    	return $this->belongsTo(User::class);
    }
}
