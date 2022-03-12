<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Models\User;
use App\Models\Ujian;

use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function importSiswaExcel(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_Excel di dalam folder public
		$file->move('file_Excel',$nama_file);

		// import data
		Excel::import(new SiswaImport, public_path('/file_Excel/'.$nama_file));

        return redirect('/')->with('succes','berhasil import');
    }
}
