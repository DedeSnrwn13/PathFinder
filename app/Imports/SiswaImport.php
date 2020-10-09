<?php

namespace App\Imports;

use App\Pelamar;
use App\User;
use App\Pekerjaan;
use App\Pendidikan;
use App\Roles;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Str;


class SiswaImport implements ToCollection
{
    use Importable;

    // public function transformDate($value, $format = 'Y-m-d')
    // {

    //     try {

    //         return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));

    //     } catch (\ErrorException $e) {

    //         return \Carbon\Carbon::createFromFormat($format, $value);

    //     }

    // }

    public function collection(Collection $rows)
    {
        // dd($rows);

        foreach ($rows as $key => $row)
        {
            // return dd($row);

            if($row[2]&&$row[8]&&$row[22]&&$row[23]) {
                if ($key >= 3) {
                    $user = User::create([
                        //'role'           => 'pelamar',//$userRole->id,
                        'nama_depan'     => $row[2],
                        'nama_belakang'  => null,
                        'email'          => $row[8],
                        'password'       => Hash::make('allsecrets'),
                        'created_by'     => $row[22],
                        'created_date'   => date("Y-m-d H:i"),
                        'updated_by'     => $row[23],
                        'updated_date'   => date("Y-m-d H:i"),
                        'activation_code' => Str::random(60).$row[8],
                        'remember_token'  => Str::random(60),
                    ]);
                }
            }

            if($row[2]) {
                if ($key >= 3) {
                    Roles::create([
                        'user_id'     => $user->id,
                        'name'        => $row[2],
                        'description' => 'pelamar',
                    ]);
                }
            }

            if($row[9]) {
                if ($key >= 3) {
                    $pekerjaan = Pekerjaan::create([
                        'nama_perusahaan'    => $row[15],
                        'posisi'             => $row[16],
                        'mulai_kerja'        => $row[17],
                        'berakhir_kerja'     => $row[18],
                    ]);

                    $pendidikan = Pendidikan::create([
                        'nama_sekolah'       => $row[9],
                        'jenjang_pendidikan' => $row[10],
                        'jurusan'            => $row[11],
                        'nilai'              => $row[12],
                        'mulai_pendidikan'   => $row[13],
                        'selesai_pendidikan' => $row[14],
                    ]);
                }
            }

            if($row[2]) {
                if ($key >= 3) {
                    Pelamar::create([
                        'user_id'                     => $user->id,
                        'avatar'                      => null,
                        'nama'                        => $row[2],
                        'tempat_lahir'                => $row[3],
                        'tanggal_lahir'               => $row[4],
                        'gender'                      => $row[5],
                        'agama'                       => $row[6],
                        'email'                       => $row[8],
                        'pekerjaan_id'                => $pekerjaan->id,
                        'pendidikan_id'               => $pendidikan->id,
                        'mingaji'                     => $row[19],
                        'maxgaji'                     => $row[20],
                        'pekerjaan_yang_akan_dilamar' => $row[21],
                    ]);
                }
            }
        }
    }
}

