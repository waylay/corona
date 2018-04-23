<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = ['note','user_id','entry_id','created_at'];

	public $timestamps = false;

	protected $dates = ['created_at'];

    public function user() {
    	return $this->belongsTo('\App\User');
    }

	public function entry() {
		return $this->belongsTo('\App\Entry');
	}

    public function getNoteAttribute($note) {
    	return e($note);
    }

}
