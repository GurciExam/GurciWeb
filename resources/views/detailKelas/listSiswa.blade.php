<div class="row">
    <h1 class="text-center">Ini adalah List Siswa</h1>
</div>
<div class="row">
  <div class="col">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswa">
      Tambah Siswa
    </button>
  </div>
</div>
<div class="row">
    <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
          The current button
        </button>
        <button type="button" class="list-group-item list-group-item-action">A second item</button>
        <button type="button" class="list-group-item list-group-item-action">A third button item</button>
        <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
        <button type="button" class="list-group-item list-group-item-action" disabled>A disabled button item</button>
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
          {{-- <input type="text" name="_token" value="{{ csrf_token() }}" hidden> --}}

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Masukkan Data Excel</label>
          </div>
          <div class="mb-3">
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

<script>
 $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

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
                  alert('berhasil!');
              },
              error: function (data) {
                  alert('gagal!');
              }
          })
      }
  })
</script>
