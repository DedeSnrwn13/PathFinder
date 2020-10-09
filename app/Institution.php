<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Institution extends Model
{
    // use Authenticatable, CanResetPassword;

    protected $table = 'institution';

    protected $fillable = ['user_id', 'nama_sekolah', 'logo_institusi', 'no_hp', 'alamat', 'email'];

    protected $casts = ['email_verified_at' => 'datetime'];

    protected $hidden = ['remember_token'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }

}
