<?php

namespace App;

use App\Pelamar;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaan';

    protected $fillable = ['nama_perusahaan', 'posisi', 'mulai_kerja', 'berakhir_kerja'];

    public function pelamar()
    {
        return $this->hasMany('App\Pelamar');
    }
}
