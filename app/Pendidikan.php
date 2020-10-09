<?php

namespace App;

use App\Pelamar;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
     protected $table = 'pendidikan';

     protected $fillable = ['nama_sekolah', 'jenjang_pendidikan', 'jurusan', 'nilai', 'mulai_pendidikan', 'selesai_pendidikan'];

     public function pelamar()
    {
        return $this->hasMany('App\Pelamar');
    }
}
