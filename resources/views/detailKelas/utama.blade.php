<div class="container">
    <div class="row">
        <h4>Detail kelas (id = {{$idKelas}})</h4>
    </div>
    <div class="row">
        <div class="col-12">
            {{-- <div class="tabtab bg-white rounded mb-4" id="contentkanan"> --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="listSiswa-tab" data-bs-toggle="tab" data-bs-target="#listSiswa" type="button" role="tab" aria-controls="listSiswa" aria-selected="false">List Siswa</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="true">List Ujian</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rekapitulasi-tab" data-bs-toggle="tab" data-bs-target="#rekapitulasi" type="button" role="tab" aria-controls="rekapitulasi" aria-selected="false">Rekapitulasi Kelas</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active text-dark" id="listSiswa" role="tabpanel" aria-labelledby="listSiswa-tab">@include('detailKelas.listSiswa.listSiswa')</div>
                    <div class="tab-pane fade text-dark" id="detail" role="tabpanel" aria-labelledby="detail-tab">@include('detailKelas.listUjian.listUjian')</div>
                    <div class="tab-pane fade text-dark" id="rekapitulasi" role="tabpanel" aria-labelledby="rekapitulasi-tab">@include('detailKelas.rekapitulasi.rekapitulasi')</div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>


{{-- CATATAN --}}

{{-- Soal Ujian -> form soal ujian -> Scanning -> ambil data masuk nilai siswa --}}