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
