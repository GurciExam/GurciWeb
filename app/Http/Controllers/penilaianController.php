<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kelas;

use Illuminate\Support\Str;

class penilaianController extends Controller
{
    public function tambahKelas(Request $request)
    {
        $tambahKelas = new Kelas;
        $tambahKelas->namaKelas = $request->namaKelas;
        $tambahKelas->deskripsiKelas = $request->deskripsiKelas;
        $tambahKelas->kapasitas = $request->kapasitas;
        $tambahKelas->kodeKelas = Str::random(5);
        $tambahKelas->save();
    }
}
