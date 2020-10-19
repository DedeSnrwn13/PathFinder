<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employer';
    protected $fillable = [
        'nama_depan', 'nama_belakang', 'email', 'password', 'user_id',
    ];

    public function user()
    {
    	return $this->hasOne('App\User');
    }
}
