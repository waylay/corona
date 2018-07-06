<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Entry extends Model
{
    protected $fillable = ['name', 'email', 'province', 'birthday', 'language'];

    public function getBirthdayAttribute($birdthday)
    {
        return Carbon::parse($birdthday)->format('m-d-Y');
    }

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->format('m-d-Y H:i');
    }
}
