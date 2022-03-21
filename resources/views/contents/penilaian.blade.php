
<h1 class="text-center">Penilaian</h1>
<hr>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="row mb-2">
                <div class="col">
                    <nav class="navbar navbar-light bg-light">
                        <h1 class="navbar-brand">List Kelas</h1>
                    </nav>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <button class="btn btn-outline-success" id="buttonTambahKelas" type="button" data-bs-toggle="modal" data-bs-target="#tambahKelas">Tambah</button>
                </div>
                <div class="col-7 offset-1">
                    <input class="form-control" type="search" placeholder="Search Kelas.." aria-label="Search" id="textSearchKelas" name="textSearchKelas">
                </div>
            </div>
            <div class="row mb-3">
                <div class="list-group" id="listKelas">

                    @foreach ($kelas as $item)
                        <a href="#" onclick="bukaDetailKelas('{{$item['id']}}')" class="list-group-item list-group-item-action" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$item['namaKelas']}}</h5>
                                <small>Kode Kelas: {{$item['kodeKelas']}}</small>
                            </div>
                            <div class="d-flex w-100 justify-content-between">
                                <p class="mb-1">{{$item['kapasitas']}} siswa</p>

                                <div class="btn-group dropstart">
                                    <button type="button" class="btn dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                          </svg>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button class="ubahKelasss dropdown-item" data-data="{{$item}}" type="button">Ubah</button></li>
                                        <li><button class="hapusKelas dropdown-item" data-id='{{$item['id']}}' type="button">Hapus</button></li>
                                    </ul>
                                </div>
                                
                            </div>
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
          <h5 class="modal-title" id="tambahKelasLabel">Form Tambah Kelas</h5>
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

{{-- Modal Ubah Kelas --}}
<div class="modal fade" id="ubahKelas" tabindex="-1" aria-labelledby="ubahKelasLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ubahKelasLabel">Form Ubah Kelas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          <form action="#" method="GET" id="ubahKelasform">
            @csrf

            <input type="hidden" name="idUbah" value="">

            <div class="form-group mb-3">
              <label for="namaKelasUbah" class="form-label">Nama Kelas</label>
              <input type="text" name="namaKelasUbah" class="form-control" id="namaKelasUbah">
            </div>

            <div class="form-group mb-3">
              <label for="deskripsiKelasUbah">Deskripsi Kelas</label>
              <textarea class="form-control" name="deskripsiKelasUbah" id="deskripsiKelasUbah" rows="3"></textarea>
            </div>

            <div class="form-group mb-3">
              <label for="kapasitasUbah" class="form-label">Kapasitas</label>
              <input type="number" name="kapasitasUbah" class="form-control" id="kapasitasUbah">
            </div>
            
            <div class="buttonsubmit text-center">
              <button type="button" class="btn btn-primary" id="submitUbahKelas">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

  <script>
    // search kelas
    $("#textSearchKelas").on("keyup", function() {
      var value = $(this).val().toLowerCase();

      $("#listKelas a").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });

    });

    // passing data ke modal ubah
      $('.ubahKelasss').on('click', function () {
        $data = $(this).data('data');
        $('input[name=namaKelasUbah]').val($data['namaKelas']);
        $('textarea[name=deskripsiKelasUbah]').val($data['deskripsiKelas']);
        $('input[name=kapasitasUbah]').val($data['kapasitas']);
        $('input[name=idUbah]').val($data['id']);
        $('#ubahKelas').modal('show');

        $('#submitUbahKelas').on('click',function () {

          $konfirmasi = confirm('Yakin Ubah?');

          if ($konfirmasi) {
              // AJAX FORM TANPA RELOAD
              $.ajax({
                type: "PUT",
                url: "{{ route('ubahKelas') }}",    //Masuk controller
                data: $("#ubahKelasform").serialize(),
                success: function(data) {
                  alert('berhasil!');

                  $('#ubahKelas').modal('hide');

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

    // hapus kelas
      $('.hapusKelas').on('click',function(){
        $konfirmasi = confirm('Yakin Hapus?');
        if ($konfirmasi) {
          var id = $(this).data('id'); 

          $.ajax({
            type:'POST',
            url:"{{ route('hapusKelas')}}",
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

                      // hilangkan modal
                      $('#tambahKelas').modal('hide');

                      // panggil tampilan kembali agar refresh
                      $('#tabpenilaian').click();
                  },
                  error: function (data) {
                      alert('gagal!');
                  }
              })
          }

      })

    // buka detail kelas
      function bukaDetailKelas(params) {
          $.get("{{ route('bukaDetailKelas') }}",{params:params},function (data) {
              $("#detailKelas").html(data);
          })
      }
  </script>