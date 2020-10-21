<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';

    protected $fillable = [
        'user_id', 'hobby_one', 'hobby_two', 'hobby_three', 'hobby_four', 'hobby_five',
        'strenght_one', 'strenght_two', 'strenght_three', 'strenght_four', 'strenght_five',
        'weakness_one', 'weakness_two', 'weakness_three', 'weakness_four', 'weakness_five',
    ];

    // public function pelamar()
    // {
    // 	return $this->belongsTo('App\Pelamar');
    // }

    // public function pelamar()
    // {
    // 	return $this->hasOne('App\Pelamar');
    // }

    public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
