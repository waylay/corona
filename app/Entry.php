<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
	protected $fillable = ['firstname','lastname','email','phone','address','address2','city','province','postalcode','imei','purchased','receipt','status','language'];

	protected $casts = [
		'emailed' => 'boolean',
		'validated' => 'boolean',
		'shipped' => 'boolean'
	];

	/**
	 * Get the notes for the entry
	 */
	public function notes()
	{
		return $this->hasMany('App\Note');
	}

	public function getLanguageAttribute($language){
		return ucfirst($language);
	}

	public function setPostalcodeAttribute($postalcode) {
		// Add a space after 3 char if it has not been added
		$postalcode = str_replace(' ','',$postalcode);
		$postalcode = wordwrap($postalcode, strlen($postalcode)-3,' ', true);

		$this->attributes['postalcode'] = strtoupper($postalcode);
	}
}
