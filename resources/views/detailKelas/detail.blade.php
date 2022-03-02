<div class="row">
    <h1 class="text-center">Ini adalah Detail Ujian</h1>
</div>
<div class="row">
    <div class="col">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUjianform">
            Launch static backdrop modal
        </button> 
    </div>
</div>
<div class="row">
    <div class="row">
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active" aria-current="true">The current button</button>
            <button type="button" class="list-group-item list-group-item-action">A second item</button>
            <button type="button" class="list-group-item list-group-item-action">A third button item</button>
            <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
            <button type="button" class="list-group-item list-group-item-action" disabled>A disabled button item</button>
        </div>
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
                <form action="#" method="GET" id="tambahUjianform">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="namaKelas" class="form-label">Nama Ujian</label>
                                <input type="text" name="namaKelas" class="form-control" id="namaKelas">
                            </div>
        
                            <div class="form-group mb-3">
                                <label for="deskripsiKelas">Deskripsi Ujian</label>
                                <textarea class="form-control" name="deskripsiKelas" id="deskripsiKelas" rows="3"></textarea>
                            </div>
        
                            <div class="form-group mb-3">
                                <label for="banyakSoal" class="form-label">Banyak Soal</label>
                                <input type="number" name="banyakSoal" class="form-control" id="banyakSoal">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="buttonsubmit text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSoalform">Masukkan Soal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah Soal --}}
<div class="modal fade" id="tambahSoalform" tabindex="-1" aria-labelledby="tambahSoalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSoalLabel">Tambah Soal Ujian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="GET" id="tambahSoalform">
                    @csrf
                    <div class="row">
                        <div class="col-12">

                            <h4 class="text-center">Soal ke 1</h4>

                            <div class="form-group mb-3">

                                <div class="inputSoal mb-3">
                                    <label for="banyakSoal" class="form-label">Pilihan</label>
                                    <div class="btn-group me-2" role="group" aria-label="First group">
                                        <button type="button" class="btn btn-outline-secondary">A</button>
                                        <button type="button" class="btn btn-outline-secondary">B</button>
                                        <button type="button" class="btn btn-outline-secondary">C</button>
                                        <button type="button" class="btn btn-outline-secondary">D</button>
                                    </div>
                                </div>

                                <label for="summernote">Soal</label>
                                <div class="textarea" style="background-color: white; color:black; margin-bottom:30px;">
                                    <textarea id="summernoteSoal" name="soalUjian"></textarea>
                                </div>
                            </div>
                        
                            <div class="form-group mb-3">
                                <label for="summernote">Deskripsi Jawaban</label>
                                <div class="textarea" style="background-color: white; color:black; margin-bottom:30px;">
                                    <textarea id="summernoteJawaban" name="deskripsiJawaban"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="buttonsubmit text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUjianform">Back</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSoalform">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  <script>
    $(document).ready(function() {
      $('#summernoteSoal').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 200
      });
      $('#summernoteJawaban').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 200
      });
    });
  </script>