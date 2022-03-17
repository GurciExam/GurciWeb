<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Temp_Import_Siswa;
use App\Models\User;
use App\Models\Siswa;

use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Str;

class siswaController extends Controller
{
    public function importSiswaExcel(Request $request)
    {

        // Ambil id kelas
        $idKelas = $request->idKelas;

        // Bersihkan temporary
        Temp_Import_Siswa::query()->delete();

        // bersihkan data siswa dikelas
        Siswa::where('kelas_id',$idKelas)->delete();

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

        $this->storeSiswa($idKelas);

        Temp_Import_Siswa::query()->delete();

    }

    public function storeSiswa($idKelas)
    {
        // id Guru
        $email = session('data')['email'];
        $idUser = User::where('email',$email)->first()->id;

        // ambil data satu satu dari temporary
        $dataTemp = Temp_Import_Siswa::all();

        foreach ($dataTemp as $item) {
            $storeSiswa = new Siswa;
            $storeSiswa->guru_id        = $idUser;
            $storeSiswa->kelas_id       = $idKelas;
            $storeSiswa->namaSiswa      = $item['namaSiswa'];
            $storeSiswa->nis            = $item['nis'];
            $storeSiswa->jenisKelamin   = $item['jenisKelamin'];
            $storeSiswa->tanggalLahir   = $item['tanggalLahir'];
            $storeSiswa->alamat         = $item['alamat'];
            $storeSiswa->save();
        }
        
    }

    public function tambahSiswaSatuan(Request $request)
    {
        // id Guru
        $email = session('data')['email'];
        $idUser = User::where('email',$email)->first()->id;
        
        $tambahSiswaSatuan = new Siswa;
        $tambahSiswaSatuan->guru_id      = $idUser;
        $tambahSiswaSatuan->kelas_id     = $request->idKelas;
        $tambahSiswaSatuan->namaSiswa    = $request->namaSiswa;
        $tambahSiswaSatuan->nis          = $request->nis;
        $tambahSiswaSatuan->jenisKelamin = $request->jenisKelamin;
        $tambahSiswaSatuan->tanggalLahir = $request->tanggalLahir;
        $tambahSiswaSatuan->alamat       = $request->alamat;
        $tambahSiswaSatuan->save();
    }

    public function detailSiswa(Request $request)
    {
        $idSiswa = $request->params;

        $siswa = Siswa::find($idSiswa);

        return view('detailKelas.listSiswa.detailSiswa', compact('siswa'));
    }

    public function ubahSiswa(Request $request)
    {
        $id = $request->idSiswaUbah;
        $ubahSiswa = Siswa::find($id);
        $ubahSiswa->namaSiswa    = $request->namaSiswaUbah;
        $ubahSiswa->nis          = $request->nisUbah;
        $ubahSiswa->jenisKelamin = $request->jenisKelaminUbah; 
        $ubahSiswa->tanggalLahir = $request->tanggalLahirUbah;
        $ubahSiswa->alamat       = $request->alamatUbah;
        $ubahSiswa->save();

    }

    public function hapusSiswa(Request $request)
    {
        Siswa::find($request->id)->delete();
    }
}
