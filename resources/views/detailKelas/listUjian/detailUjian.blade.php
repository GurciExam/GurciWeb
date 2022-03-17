<div class="container-fluid">
    <div class="boxIsi p-3 mb-5" style="border: solid 1px black">
        <div class="row">
            <div class="col-4">
                <h5>Nama : {{$ujian['namaUjian']}}</h5>
            </div>
            <div class="col-4">
                <h5>Janis : {{$ujian['jenisUjian']}}</h5>
            </div>
            <div class="col-4">
                <h5>Banyak Soal : {{$ujian['banyakSoal']}}</h5>
            </div>
            <div class="col-4">
                <h5>Kode Ujian : {{$ujian['kodeUjian']}}</h5>
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