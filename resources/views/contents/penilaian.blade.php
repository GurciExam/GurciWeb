
<h1>Penilaian</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
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
                    <button id="buttonTambahKelas" type="button" data-bs-toggle="modal" data-bs-target="#tambahKelas">Tambah Kelas</button>
                </div>
                <div class="col-2">
                    <button>Hapus Kelas</button>
                </div>

            </div>
            <div class="row">
                <div class="list-group">

                    @foreach ($kelas as $item)
                        <a href="#" onclick="bukaDetailKelas('{{$item['kodeKelas']}}')" class="list-group-item list-group-item-action" aria-current="true">
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
        <div class="col-sm-9">
            <div id="detailKelas"></div>
        </div>
    </div>
</div>

{{-- Modal Tambah Kelas --}}
<div class="modal fade" id="tambahKelas" tabindex="-1" aria-labelledby="tambahKelasLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahKelasLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          <form action="#" method="GET" id="tambahKelasform">
            @csrf

            <input type="text" name="emailGuru" value="{{session('data')['email']}}" hidden>

            <div class="form-group mb-3">
              <label for="namaKelas" class="form-label">Nama Kelas</label>
              <input type="text" name="namaKelas" class="form-control" id="namaKelas">
            </div>

            <div class="form-group mb-3">
              <label for="deskripsiKelas">Deskripsi Kelas</label>
              <textarea class="form-control" name="deskripsiKelas" id="deskripsiKelas" rows="3"></textarea>
            </div>

            <div class="form-group mb-3">
              <label for="kapasitas" class="form-label">Kapasitas</label>
              <input type="number" name="kapasitas" class="form-control" id="kapasitas">
            </div>
            
            <div class="buttonsubmit text-center">
              <button type="button" class="btn btn-primary" id="submitTambahKelas">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

  <script>
         // button submit tambah kelas
    $('#submitTambahKelas').on('click',function () {

        $konfirmasi = confirm('Yakin Tambah?');

        if ($konfirmasi) {
            // AJAX FORM TANPA RELOAD
            $.ajax({
                type: "GET",
                url: "{{ route('tambahKelas') }}",    //Masuk controller
                data: $("#tambahKelasform").serialize(),
                success: function(data) {
                    alert('berhasil!');

                    $('#buttonTambahKelas').click();

                    // panggil tampilan kembali agar refresh
                    $.get("{{ route('penilaian') }}",{},function (data) {
                        $(".isisidebar").html(data);
                    })
                },
                error: function (data) {
                    alert('gagal!');
                }
            })
        }

    })

    function bukaDetailKelas(params) {
        $.get("{{ route('bukaDetailKelas') }}",{params:params},function (data) {
            $("#detailKelas").html(data);
        })
    }
  </script>