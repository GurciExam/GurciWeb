<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Models\User;
use App\Models\Ujian;

use Illuminate\Support\Str;

class penilaianController extends Controller
{
    public function tambahKelas(Request $request)
    {
        $email = $request->emailGuru;

        $idUser = User::where('email',$email)->first()->id;

        $tambahKelas = new Kelas;
        $tambahKelas->guru_id = $idUser;
        $tambahKelas->namaKelas = $request->namaKelas;
        $tambahKelas->kodeKelas = Str::random(5);
        $tambahKelas->kapasitas = $request->kapasitas;
        $tambahKelas->deskripsiKelas = $request->deskripsiKelas;
        $tambahKelas->save();
    }

    public function bukaDetailKelas(Request $request)   
    {
        $kodeKelas = $request->params;

        $idKelas = Kelas::where('kodeKelas',"$kodeKelas")->first()->id;

        $Ujian = Ujian::where('kelas_id',$idKelas)->get();

        return view ('detailKelas.utama',compact('Ujian','idKelas'));
    }
}
