<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temp_Import_Siswa extends Model
{
    protected $table = 'Temp_Import_Siswa';

    protected $fillable = ['namaSiswa','nis','jenisKelamin','tanggalLahir','alamat'];
}
