<?php

use App\Pelamar;
use App\Institution;

function totalSiswa()
{
    return Pelamar::count();
}

function totalGuru()
{
    return Institution::count();
}

// function getAvatar()
//     {
//         if (!$this->avatar) {
//             return asset('images/default.jpg');
//         } else {
//             return asset('images/'.$this->avatar);
//         }
// }


// function pengalaman() {
//     return $this->berakhir_kerja. - $this->mulai_kerja;
// }
