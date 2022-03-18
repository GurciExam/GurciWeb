<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ujian;
use App\Models\Guru;
use App\Models\User;

use Illuminate\Support\Str;

class ujianController extends Controller
{
    public function formInputSoal(Request $request)
    {
        $banyakSoal = $request->bs;
        
        return view('detailKelas.listUjian.FormInputSoal',compact('banyakSoal'));
    }

    public function formEditSoal(Request $request)
    {
        $banyakSoal = $request->bs;

        $id = $request->id;

        $ujian = Ujian::find($id);

        $namaUjian = $ujian->namaUjian;

        $pilihanUbah            = unserialize($ujian->kunciJawaban);
        $soalUjianUbah          = unserialize($ujian->soalUjian);
        $deskripsiJawabanUbah   = unserialize($ujian->penjelasanKunciJawaban);

        return view('detailKelas.listUjian.FormEditSoal',compact('banyakSoal','id','pilihanUbah','soalUjianUbah','deskripsiJawabanUbah','namaUjian'));
    }

    public function storeSoal(Request $request)
    {
        $email = session('data')['email'];

        $idUser = User::where('email',$email)->first()->id;

        $tambahUjian = new Ujian;
        $tambahUjian->guru_id = $idUser;
        $tambahUjian->kelas_id = $request->idKelas;
        $tambahUjian->namaUjian = $request->namaUjian;
        $tambahUjian->jenisUjian = $request->jenisUjian;
        $tambahUjian->deskripsiUjian = $request->deskripsiUjian;
        $tambahUjian->banyakSoal = $request->banyakSoal;

        $tambahUjian->soalUjian                 = serialize($request->soalUjian);
        $tambahUjian->kunciJawaban              = serialize($request->pilihan);
        $tambahUjian->penjelasanKunciJawaban    = serialize($request->deskripsiJawaban);


        $tambahUjian->kodeUjian = Str::random(5);
        $tambahUjian->save();
    }

    public function storeUbahSoal(Request $request)
    {

        $id = $request->idUjianUbah;

        $tambahUjian = Ujian::find($id);
        $tambahUjian->namaUjian = $request->namaUjianUbah;
        $tambahUjian->jenisUjian = $request->jenisUjianUbah;
        $tambahUjian->deskripsiUjian = $request->deskripsiUjianUbah;
        $tambahUjian->banyakSoal = $request->banyakSoalUbah;

        $tambahUjian->soalUjian                 = serialize($request->soalUjian);
        $tambahUjian->kunciJawaban              = serialize($request->pilihan);
        $tambahUjian->penjelasanKunciJawaban    = serialize($request->deskripsiJawaban);

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

    public function hapusUjian(Request $request)
    {
        Ujian::find($request->id)->delete();
    }
}
