<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Institution extends Model
{
    // use Authenticatable, CanResetPassword;

    protected $table = 'institution';

    protected $fillable = ['name', 'avatar', 'firstname', 'lastname', 'contact', 'address', 'email', 'password', 'password_confirmation'];

    protected $casts = ['email_verified_at' => 'datetime'];

    protected $hidden = ['password', 'password_confirmation', 'remember_token'];



    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'id');
    // }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    // public function user()
    // {
    //     return $this->hasMany(Siswa::class);
    // }

    public function fullname()
    {
        return $this->firstname.' '.$this->lastname;
    }

}
