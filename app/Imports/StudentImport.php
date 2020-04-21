<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'nis' => $row[1],
            'nama' => $row[2],
            'jk' => $row [3],
            'id_rombel' => $row[4],
            'id_rayon' => $row[5]
        ]);
    }
}
