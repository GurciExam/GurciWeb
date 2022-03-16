<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ujian;
use App\Models\Guru;
use App\Models\User;

use Illuminate\Support\Str;

class ujianController extends Controller
{
    public function formSoal(Request $request)
    {
        $banyakSoal = $request->bs;
        return view('contents.InputSoal',compact('banyakSoal'));
    }

    public function storeSoal(Request $request)
    {
        $email = session('data')['email'];

        $idUser = User::where('email',$email)->first()->id;
        
        $pilihan = $request->pilihan;
        $soalUjian = $request->soalUjian;
        $deskripsiJawaban = $request->deskripsiJawaban;

        $tambahUjian = new Ujian;
        $tambahUjian->guru_id = $idUser;
        $tambahUjian->kelas_id = $request->idKelas;
        $tambahUjian->namaUjian = $request->namaUjian;
        $tambahUjian->jenisUjian = $request->jenisUjian;
        $tambahUjian->deskripsiUjian = $request->deskripsiUjian;
        $tambahUjian->banyakSoal = $request->banyakSoal;

        $tambahUjian->soalUjian                 = serialize($soalUjian);
        $tambahUjian->kunciJawaban              = serialize($pilihan);
        $tambahUjian->penjelasanKunciJawaban    = serialize($deskripsiJawaban);


        $tambahUjian->kodeUjian = Str::random(5);
        $tambahUjian->save();
    }

    public function detailUjian(Request $request)
    {
        $idUjian = $request->params;

        $ujian = Ujian::find($idUjian);

        $soalUjian              = unserialize($ujian->soalUjian);
        $kunciJawaban           = unserialize($ujian->kunciJawaban);
        $penjelasanKunciJawaban = unserialize($ujian->penjelasanKunciJawaban);

        return view('detailKelas.listUjian.detailUjian', compact('ujian','soalUjian','kunciJawaban','penjelasanKunciJawaban'));
    }
}