<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';

    protected $fillable = ['user_id', 'hobby_one', 'hobby_two', 'hobby_three', 'hobby_four', 'hobby_five', 'hobby_one', 'hobby_two', 'hobby_three', 'hobby_four', 'hobby_five'];

    // public function pelamar()
    // {
    // 	return $this->belongsTo('App\Pelamar');
    // }

    // public function pelamar()
    // {
    // 	return $this->hasOne('App\Pelamar');
    // }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
