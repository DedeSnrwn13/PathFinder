<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employer';
    protected $fillable = [
        'nama_depan', 'nama_belakang', 'email', 'user_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}

