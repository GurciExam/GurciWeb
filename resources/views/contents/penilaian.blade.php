
<h1>Penilaian</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                {{-- <h3>List Kelas</h3> --}}
            </div>
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-light bg-light">
                        <h1 class="navbar-brand">List Kelas</h1>
                        <form class="form-inline">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </nav>
                </div>
            </div>
            <div class="row mb-3">
                <div class="ml-auto col-2">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahKelas">Tambah Kelas</button>
                </div>
                <div class="col-2">
                    <button>Hapus Kelas</button>
                </div>

            </div>
            <div class="row">
                <div class="list-group">

                    @foreach ($kelas as $item)
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{$item['namaKelas']}}</h5>
                            <small>Kode : {{$item['kodeKelas']}}</small>
                            </div>
                            <p class="mb-1">{{$item['kapasitas']}} siswa</p>
                            <small>{{$item['deskripsiKelas']}}</small>
                        </a>
                    @endforeach
                    
                  </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="container">
                <div class="row">
                    <h4>detail kelas</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{-- <div class="tabtab bg-white rounded mb-4" id="contentkanan"> --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="true">Ujian</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="listSiswa-tab" data-bs-toggle="tab" data-bs-target="#listSiswa" type="button" role="tab" aria-controls="listSiswa" aria-selected="false">List Siswa</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="rekapitulasi-tab" data-bs-toggle="tab" data-bs-target="#rekapitulasi" type="button" role="tab" aria-controls="rekapitulasi" aria-selected="false">Rekapitulasi</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active text-dark" id="detail" role="tabpanel" aria-labelledby="detail-tab">@include('detailKelas.detail')</div>
                                <div class="tab-pane fade text-dark" id="listSiswa" role="tabpanel" aria-labelledby="listSiswa-tab">@include('detailKelas.listSiswa')</div>
                                <div class="tab-pane fade text-dark" id="rekapitulasi" role="tabpanel" aria-labelledby="rekapitulasi-tab">@include('detailKelas.rekapitulasi')</div>
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>