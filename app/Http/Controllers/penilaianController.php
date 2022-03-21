<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Models\User;
use App\Models\Siswa;
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

    public function ubahKelas(Request $request)
    {
        $id         = $request->idUbah;
        $namaKelas  = $request->namaKelasUbah;
        $deskripsi  = $request->deskripsiKelasUbah;
        $kapasitas  = $request->kapasitasUbah;

        $ubah = Kelas::find($id);
        $ubah->namaKelas      = $namaKelas;
        $ubah->deskripsiKelas = $deskripsi;
        $ubah->kapasitas      = $kapasitas;
        $ubah->save();
    }

    public function hapusKelas(Request $request)
    {
        Kelas::find($request->id)->delete();
    }

    public function bukaDetailKelas(Request $request)   
    {
        $idKelas = $request->params;

        $kelas = Kelas::find($idKelas);

        // tab siswa
        $Siswa = Siswa::where('kelas_id',$idKelas)->get();

        // tab ujian
        $Ujian = Ujian::where('kelas_id',$idKelas)->get();

        // tab rekapitulasi
        

        return view ('detailKelas.utama',compact('Ujian','idKelas','Siswa','kelas'));
    }

    
}
