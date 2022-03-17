<div class="row mt-2">
    <h1 class="text-center">List Ujian</h1>
</div>

<div class="row mb-3">
    <div class="col">
        <!-- Button trigger modal -->
        <button type="button" id="buttonformtambahSoal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUjianform">
            Tambah Ujian
        </button> 
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            @foreach ($Ujian as $item)
                <button type="button" onclick="detailUjian({{$item['id']}})" class="list-group-item list-group-item-action active" aria-current="true">{{$item['namaUjian']}}</button>

            @endforeach

            {{-- <button type="button" class="list-group-item list-group-item-action">A second item</button>
            <button type="button" class="list-group-item list-group-item-action">A third button item</button>
            <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
            <button type="button" class="list-group-item list-group-item-action" disabled>A disabled button item</button> --}}
        </div>
    </div>
    <div class="col-md-9">
        <div id="detailUjian"></div>
    </div>
</div>


{{-- Modal Tambah Ujian --}}
<div class="modal fade" id="tambahUjianform" tabindex="-1" aria-labelledby="tambahUjianLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUjianLabel">Tambah Soal Ujian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="GET" id="formtambahUjian">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">

                            <input type="hidden" name="idKelas" value="{{$idKelas}}">  <!-- INI BELUMM AMBIL ID KELAS -->

                            <div class="form-group mb-3">
                                <label for="namaUjian" class="form-label">Nama Ujian</label>
                                <input type="text" name="namaUjian" class="form-control" id="namaUjian">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Jenis Ujian</label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenisUjian" value="ujianBiasa" id="ujianbiasa">
                                            <label class="form-check-label" for="ujianbiasa">
                                            Ujian Biasa
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenisUjian" value="ujianUTS" id="ujianUTS">
                                            <label class="form-check-label" for="ujianUTS">
                                            Ujian UTS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenisUjian" value="ujianUAS" id="ujianUAS">
                                            <label class="form-check-label" for="ujianUAS">
                                            Ujian UAS
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="deskripsiUjian">Deskripsi Ujian</label>
                                <textarea class="form-control" name="deskripsiUjian" id="deskripsiUjian" rows="3"></textarea>
                            </div>
        
                            <div class="form-group mb-3">
                                <label for="banyakSoal" class="form-label">Banyak Soal</label>
                                <input type="number" name="banyakSoal" class="form-control" id="banyakSoal">
                                <button type="button" id="fixbanyaksoal">Oke</button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="searchSoal" class="form-label">Search Soal</label>
                                        <input type="text" name="searchSoal" class="form-control" id="searchSoal">
                                    </div>
                                </div>
                            </div>
                            <div class="formSoal">
                                {{-- Muncul form input soal --}}
                                <div class="formSoalSoal" id="formSoalSoal"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="buttonsubmit text-center">
                            <button id="submitFormSoal" type="button" class="btn btn-primary">Masukkan Soal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    function detailUjian(params) {
        $.get("{{ route('detailUjian') }}",{params:params},function (data) {
            $('#detailUjian').html(data);
        })
    }

    $(document).ready(function() {
        
        $('#fixbanyaksoal').on('click',function () {
            let bs = $('#banyakSoal').val();
            $.get("{{route('formSoal')}}",{bs:bs}, function(data){
                $("#formSoalSoal").html(data);
            });
        })

        $('#submitFormSoal').on('click',function () {
            $konfirmasi = confirm('Yakin tambah Ujian?');

            if ($konfirmasi) {
                // AJAX FORM TANPA RELOAD
                $.ajax({
                    type: "GET",
                    url: "{{ route('storeSoal') }}",    //Masuk controller
                    data: $("#formtambahUjian").serialize(),
                    success: function(data) {
                        alert('berhasil!');

                        // tutup modal
                        $('#buttonformtambahSoal').click();

                        //panggil tab agar ter refresh
                        bukaDetailKelas($('input[name=idKelas]').val());
                        
                        // buka tab
                        $('#tabListUjian').click();

                    },
                    error: function (data) {
                        alert('gagal!');
                    }
                })
            }
        })
    });
</script>