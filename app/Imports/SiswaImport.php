<?php

namespace App\Imports;

use App\Siswa;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToCollection
{
    use Importable;

    public function collection(Collection $collection)
    {
        // dd($collection);
        // $siswa = Siswa::all();

        foreach ($collection as $key => $row)
        {
            if ($key >= 3) {
                Siswa::create([
                    'user_id' => NULL,
                    'institution_id' => $row[2],
                    'avatar' => NULL,
                    'firstname' => $row[4],
                    'lastname' => $row[5],
                    'email' => $row[6],
                    'gender' => $row[7],
                    'religion' => $row[8],
                    'address' => $row[9],
                    'major' => $row[10],
                    'major_average'=> $row[11],
                    'age' => $row[12],
                    'expertise' => $row[13],
                    'experience' => $row[14],
                ]);
            }

            if ($key >= 3) {
                User::create([
                    'role' => 'siswa',
                    'institution_name' => $row[2],
                    'email' => $row[6],
                    'password' => Hash::make('secret'),
                ]);
            }
        }
    }
}


// class SiswaImport implements ToCollection
// {
//     /**
//     * @param Collection $collection
//     */
//     public function model(Collection  $collection)
//     {

//         dd($collection);
//         // return new Siswa([
//             // 'user_id' => $row[1],
//             // 'institution_id' => $row[2],
//             // 'avatar' => $row[3],
//             // 'firstname' => $row[4],
//             // 'lastname' => $row[5],
//             // 'email' => $row[6],
//             // 'gender' => $row[7],
//             // 'religion' => $row[8],
//             // 'address' => $row[9],
//             // 'major' => $row[10],
//             // 'major_average'=> $row[11],
//             // 'age' => $row[12],
//             // 'expertise' => $row[13],
//             // 'experience' => $row[14],
//         // ]);

        // foreach ($rows as $row) {
        //     Siswa::create([
        //         'user_id' => $row[1],
        //         'institution_id' => $row[2],
        //         'avatar' => $row[3],
        //         'firstname' => $row[4],
        //         'lastname' => $row[5],
        //         'email' => $row[6],
        //         'gender' => $row[7],
        //         'religion' => $row[8],
        //         'address' => $row[9],
        //         'major' => $row[10],
        //         'major_average'=> $row[11],
        //         'age' => $row[12],
        //         'expertise' => $row[13],
        //         'experience' => $row[14],
        //     ]);
        // }
//     }
// }
