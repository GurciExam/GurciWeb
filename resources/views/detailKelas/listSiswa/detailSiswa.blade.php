<div class="container-fluid">
    <div class="boxIsi p-3" style="border: solid 1px black">
        <div class="row">
          <div class="col-4">
              <h5>Nama : {{$siswa['namaSiswa']}}</h5>
          </div>
          <div class="col-4">
              <h5>NIS : {{$siswa['nis']}}</h5>
              <h5>Jenis Kelamin : {{$siswa['jenisKelamin']}}</h5>
          </div>
          <div class="col-4">
              <h5>Tanggal Lahir : {{date('d-m-Y', strtotime($siswa->tanggalLahir))}}</h5>
              <h5>Alamat : {{$siswa['alamat']}}</h5>
          </div>
          <div class="col-4">
            <div class="btn-group">
              <button type="button" class="btn dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                      <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
              </button>
              <ul class="dropdown-menu">
                  <li><button class="ubahSiswa dropdown-item" data-data="{{$siswa}}" type="button">Ubah</button></li>
                  <li><button class="hapusSiswa dropdown-item" data-id='{{$siswa['id']}}' type="button">Hapus</button></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, amet recusandae. Voluptas non magni id eum, autem quia ullam fugiat, culpa a distinctio architecto. Repellendus voluptate omnis maiores unde dolorum.</p>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table caption-top">
                    <caption>List Nilai</caption>
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Ujian</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Nilai</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Pengayaan Materi jaringan</td>
                        <td>UjianHarian</td>
                        <td>10%</td>
                        <td>70</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Pengayaan Materi Bandwidth</td>
                        <td>UjianHarian</td>
                        <td>10%</td>
                        <td>70</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Pengayaan Materi Latency</td>
                        <td>UjianHarian</td>
                        <td>10%</td>
                        <td>70</td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Final test UTS</td>
                        <td>UjianUTS</td>
                        <td>30%</td>
                        <td>70</td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Final test UAS</td>
                        <td>UjianUAS</td>
                        <td>40%</td>
                        <td>70</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    
</div>

<!-- Modal ubah Siswa -->
<div class="modal fade" id="ubahSiswa" tabindex="-1" aria-labelledby="ubahSiswaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahSiswaLabel">Ubah Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" method="POST" id="formUbahSiswa">
          @csrf

          <input type="text" name="idSiswaUbah" value="" hidden>

          <div class="form-group mb-3">
              <label for="namaSiswa" class="form-label">Nama Siswa</label>
              <input type="text" name="namaSiswaUbah" class="form-control" id="namaSiswa">
          </div>
          <div class="form-group mb-3">
              <label for="nis" class="form-label">NIS</label>
              <input type="number" name="nisUbah" class="form-control" id="nis">
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <div class="row">
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelaminUbah" value="L" id="lakiLaki">
                        <label class="form-check-label" for="lakiLaki">
                        Laki Laki
                        </label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelaminUbah" value="P" id="perempuan">
                        <label class="form-check-label" for="perempuan">
                        Perempuan
                        </label>
                    </div>
                </div>
            </div>
          </div>

          <div class="form-group mb-3">
              <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggalLahirUbah" class="form-control" id="tanggalLahir">
          </div>

          <div class="form-group mb-3">
            <label for="alamat" class="form-label">Alamat</label><br>
            <textarea name="alamatUbah" id="alamatUbah" cols="52" rows="3"></textarea>
          </div>
          
          <button type="submit" id="submitUbahSiswa" class="btn btn-primary">Submit</button>

        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Ubah Siswa
  $('.ubahSiswa').on('click',function () {
    var data = $(this).data('data');
    $('input[name=idSiswaUbah]').val(data['id']);
    $('input[name=namaSiswaUbah]').val(data['namaSiswa']);
    $('input[name=nisUbah]').val(data['nis']);
    $("input[value="+data['jenisKelamin']+"]").attr('checked',true);
    $('input[name=tanggalLahirUbah]').val(data['tanggalLahir']);
    $('textarea[name=alamatUbah]').val(data['alamat']);

    $('#ubahSiswa').modal('show');

    $('#submitUbahSiswa').on('click', function () {
      
      var konfirmasi = confirm('Yakin Ubah?');

      if (konfirmasi) {
        $.ajax({
          type: 'PUT',
          url: "{{ route('ubahSiswa') }}",
          data: $('#formUbahSiswa').serialize(),
          success: function (data) {
            alert('berhasil');
            
            $('#ubahSiswa').modal('hide');

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

  // Hapus Siswa
  $('.hapusSiswa').on('click',function () {
    var konfirmasi = confirm('yakin Hapus?');

    if (konfirmasi) {
      var id = $(this).data('id'); 

      $.ajax({
        type:'POST',
        url:"{{ route('hapusSiswa')}}",
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