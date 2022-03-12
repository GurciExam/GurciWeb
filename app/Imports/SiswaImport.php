<?php

namespace App\Imports;

use App\Models\Temp_Import_Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Temp_Import_Siswa([

            // 'id'            => $row[1],
            'namaSiswa'     => $row['namasiswa'],
            'nis'           => $row['nis'],
            'jenisKelamin'  => $row['jeniskelamin'],
            'tanggalLahir'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggallahir']),
            'alamat'        => $row['alamat'],
        ]);
    }
}
