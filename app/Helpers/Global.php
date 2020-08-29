<?php

use App\Siswa;
use App\Institution;

function totalSiswa()
{
    return Siswa::count();
}

function totalGuru()
{
    return Institution::count();
}