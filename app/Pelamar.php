<?php

namespace App;

use App\User;
use App\Pekerjaan;
use App\Pendidikan;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $table = 'pelamar';

    protected $fillable = ['avatar', 'user_id', 'nama', 'email', 'gender', 'agama', 'tempat_lahir','tanggal_lahir', 'pekerjaan_id', 'pendidikan_id', 'mingaji', 'maxgaji','pekerjaan_yang_akan_dilamar'];


    public function user()
    {
    	return $this->hasOne('App\User');
    }

    public function pekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan');
    }

    public function pendidikan()
    {
        return $this->belongsTo('App\Pendidikan');
    }

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        } else {
            return asset('images/'.$this->avatar);
        }
    }

    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }

    public function pengalaman() {
        return $this->berakhir_kerja + $this->mulai_kerja;
    }
}
