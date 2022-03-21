<div class="row">
    <h1 class="text-center mt-2">List Siswa</h1>
</div>
<div class="row mb-2">
  <div class="col-5">
    <!-- Button trigger tambah siswa excel -->
    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswa">
      Tambah Siswa excel
    </a>
    <!-- Button trigger tambah siswa satuan -->
    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswaSatuan">
      Tambah Siswa satuan
    </a>
  </div>
  <div class="col-3">
    <input class="form-control" type="search" placeholder="Search Siswa.." aria-label="Search" id="textSearchSiswa" name="textSearchSiswa">
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <div class="list-group" id="listSiswa">
      @foreach ($Siswa as $item)
        <button type="button" onclick="detailSiswa({{$item['id']}})" class="list-group-item list-group-item-action active" aria-current="true">
          {{$item['namaSiswa']}}
        </button>
      @endforeach
        {{-- <button type="button" class="list-group-item list-group-item-action">A second item</button>
        <button type="button" class="list-group-item list-group-item-action">A third button item</button>
        <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
        <button type="button" class="list-group-item list-group-item-action" disabled>A disabled button item</button> --}}
    </div>
  </div>
  <div class="col-md-9">
    <div id="detailSiswa"></div>
  </div>
    
</div>

<!-- Modal Tambah Siswa dari Excel -->
<div class="modal fade" id="tambahSiswa" tabindex="-1" aria-labelledby="tambahSiswaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahSiswaLabel">Import Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" id="formImportSiswaExcel">
          @csrf

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Masukkan Data Excel</label>
          </div>
          <div class="mb-3">
            <input type="hidden" name="idKelas" value="{{$idKelas}}">
            <input id="file" type="file" name="file" required="required">
          </div>
          <button type="submit" id="submitImportExcel" class="btn btn-primary">Submit</button>
        </form>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>

<!-- Modal Tambah Siswa Satuan -->
<div class="modal fade" id="tambahSiswaSatuan" tabindex="-1" aria-labelledby="tambahSiswaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahSiswaLabel">Import Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" method="POST" id="formImportSiswaSatuan">
          @csrf

          <input type="text" name="idKelas" value="{{$idKelas}}" hidden>

          <div class="form-group mb-3">
              <label for="namaSiswa" class="form-label">Nama Siswa</label>
              <input type="text" name="namaSiswa" class="form-control" id="namaSiswa">
          </div>
          <div class="form-group mb-3">
              <label for="nis" class="form-label">NIS</label>
              <input type="number" name="nis" class="form-control" id="nis">
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <div class="row">
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelamin" value="L" id="lakiLaki">
                        <label class="form-check-label" for="lakiLaki">
                        Laki Laki
                        </label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelamin" value="P" id="perempuan">
                        <label class="form-check-label" for="perempuan">
                        Perempuan
                        </label>
                    </div>
                </div>
            </div>
          </div>

          <div class="form-group mb-3">
              <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggalLahir" class="form-control" id="tanggalLahir">
          </div>

          <div class="form-group mb-3">
            <label for="alamat" class="form-label">Alamat</label><br>
            <textarea name="alamat" id="alamat" cols="52" rows="3"></textarea>
          </div>
          
          <button type="submit" id="submitSatuan" class="btn btn-primary">Submit</button>

        </form>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>



<script>
  // search Siswa
  $("#textSearchSiswa").on("keyup change", function() {
    var value = $(this).val().toLowerCase();

    $("#listSiswa button").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });

  });
  
  // token untuk post di AJAX CSRF
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  // buka data siswa
  function detailSiswa(params) {
    $.get("{{ route('detailSiswa') }}",{params:params},function (data) {
      $('#detailSiswa').html(data);
    })
  }

  // import excel
  $('#formImportSiswaExcel').submit(function (e) {

    $konfirmasi = confirm('Yakin Import?');
    
    if ($konfirmasi) {
      // AJAX FORM TANPA RELOAD
          e.preventDefault();
      
          var formData = new FormData(this);

          $.ajax({
            type: "POST",
            url: "{{ route('importSiswaExcel') }}",    //Masuk controller
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
              success: function(data) {
                alert('berhasil Import Excel!');
                
                // tutup modal
                $('#tambahSiswa').click();

                //panggil tab agar ter refresh
                bukaDetailKelas($('input[name=idKelas]').val());

              },
              error: function (data) {
                alert('Isilah dengan lengkap!!');
              }
          })
      }
  })

  // import siswa satuan
  $('#formImportSiswaSatuan').submit(function(e){

    $konfirmasi = confirm('Yakin Tambah?');
    
    if ($konfirmasi) {

      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({
        type: 'POST',
        url: "{{ route('importSiswaSatuan') }}",
        data: $('#formImportSiswaSatuan').serialize(),
        success: function(data) {
          alert('berhasil tambah Siswa!');

          // tutup modal
          $('#tambahSiswaSatuan').click();

          //panggil tab agar ter refresh
          bukaDetailKelas($('input[name=idKelas]').val());
        },
        error: function (data) {
          alert('Isilah dengan lengkap!');
        }
      })
    }
  })

</script>
