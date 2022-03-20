<div class="container-fluid">
    <div class="boxIsi p-3 mb-5" style="border: solid 1px black">
        <div class="row">
            <div class="col-sm-4">
                <h5>Nama : {{$ujian['namaUjian']}}</h5>
            </div>
            <div class="col-sm-4">
                <h5>Janis : {{$ujian['jenisUjian']}}</h5>
            </div>
            <div class="col-sm-4">
                <h5>Banyak Soal : {{$ujian['banyakSoal']}}</h5>
            </div>
            <div class="col-sm-4">
                <h5>Kode Ujian : {{$ujian['kodeUjian']}}</h5>
            </div>
            <div class="col-sm-4">
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                          </svg>
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="ubahUjian dropdown-item" data-data="{{$ujian}}" type="button">Ubah</button></li>
                        <li><button class="hapusUjian dropdown-item" data-id="{{$ujian['id']}}" type="button">Hapus</button></li>
                    </ul>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>{{$ujian['deskripsiUjian']}}Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, amet recusandae. Voluptas non magni id eum, autem quia ullam fugiat, culpa a distinctio architecto. Repellendus voluptate omnis maiores unde dolorum.</p>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <input type="text" class="form-control" id="search" placeholder="search..">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary mb-2">Cari</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="listSoalSoal">

                    @for ($i = 0; $i < count($soalUjian); $i++)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Soal {{$i+1}}</h5>
                                <p>Soal Ujian :</p>
                                {!! htmlspecialchars_decode(stripslashes($soalUjian[$i])) !!}
                                <p>Kunci Jawaban :</p>
                                <h3>{{$kunciJawaban[$i]}}</h3>
                                <p>Penjelasan :</p>
                                {!! htmlspecialchars_decode(stripslashes($penjelasanKunciJawaban[$i])) !!}
                            </div>
                        </div>

                    @endfor
                </div>
            </div>
        </div>
    </div>
    
</div>

{{-- Modal Ubah Ujian --}}
<div class="modal fade" id="ubahUjianform" tabindex="-1" aria-labelledby="ubahUjianLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubahUjianLabel">Ubah Soal Ujian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="GET" id="formubahUjian">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">

                            <input type="hidden" name="idUjianUbah" value="">

                            <div class="form-group mb-3">
                                <label for="namaUjian" class="form-label">Nama Ujian</label>
                                <input type="text" name="namaUjianUbah" class="form-control" id="namaUjian">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Jenis Ujian</label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenisUjianUbah" value="ujianBiasa" id="ujianbiasa">
                                            <label class="form-check-label" for="ujianbiasa">
                                            Ujian Biasa
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenisUjianUbah" value="ujianUTS" id="ujianUTS">
                                            <label class="form-check-label" for="ujianUTS">
                                            Ujian UTS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenisUjianUbah" value="ujianUAS" id="ujianUAS">
                                            <label class="form-check-label" for="ujianUAS">
                                            Ujian UAS
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="deskripsiUjian">Deskripsi Ujian</label>
                                <textarea class="form-control" name="deskripsiUjianUbah" id="deskripsiUjian" rows="3"></textarea>
                            </div>
        
                            <div class="form-group mb-3">
                                <label for="banyakSoal" class="form-label">Banyak Soal</label>
                                <input type="number" name="banyakSoalUbah" class="form-control" id="banyakSoal">
                                <button type="button" id="fixbanyaksoalUbah">Oke</button>
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
                                <div class="formSoalSoal" id="formSoalSoalUbah"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="buttonsubmit text-center">
                            <button id="submitFormSoalUbah" type="button" class="btn btn-primary">Masukkan Soal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Ubah Ujian
        $('.ubahUjian').on('click',function () {
            var data = $(this).data('data');
            $('input[name=idUjianUbah]').val(data['id']);
            $('input[name=namaUjianUbah]').val(data['namaUjian']);
            $("input[value="+data['jenisUjian']+"]").attr('checked',true);
            $('textarea[name=deskripsiUjianUbah]').val(data['deskripsiUjian']);

            //ambil data banyak soal sebelumnya
            $('input[name=banyakSoalUbah]').val(data['banyakSoal']);
            let bs = data['banyakSoal'];
            let id = data['id'];

            $.get("{{route('formSoalUbah')}}",{bs:bs,id:id}, function(data){
                $("#formSoalSoalUbah").html(data);
            });

            //edit banyak soal
            $('#fixbanyaksoalUbah').on('click',function () {

                let konfirm = confirm('Merubah banyak soal akan menyebabkan seluruh soal hilang, yakin?');

                if (konfirm) {
                    let bs = $('#banyakSoal').val();
                    $.get("{{route('formSoal')}}",{bs:bs}, function(data){
                        $("#formSoalSoalUbah").html(data);
                    });
                }
            })

            $('#ubahUjianform').modal('show');


            $('#submitFormSoalUbah').on('click', function () {
            
                var konfirmasi = confirm('Yakin Ubah?');

                if (konfirmasi) {
                    $.ajax({
                        type: 'PUT',
                        url: "{{ route('storeUbahSoal') }}",
                        data: $('#formubahUjian').serialize(),
                        success: function (data) {
                            alert('berhasil');
                            
                            $('#ubahUjianform').modal('hide');

                            // tekan lagi panggil ulang
                            $('#tabpenilaian').click();
                        },
                        error: function (data) {
                            alert('gagal!');
                        }
                    })
                }
            })
        })
    // Hapus Ujian
        $('.hapusUjian').on('click',function () {
            var konfirmasi = confirm('yakin Hapus?');

            if (konfirmasi) {
                var id = $(this).data('id'); 

                $.ajax({
                    type:'POST',
                    url:"{{ route('hapusUjian')}}",
                    data:{id:id},
                    success: function(result){
                    alert('berhasil hapus!');
                    $('#tabpenilaian').click();
                    },
                    error: function(result){
                    alert('gagal!');
                    }
                })
            }
        })
    </script>
    


    