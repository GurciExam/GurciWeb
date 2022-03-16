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
                <h5>Tanggal Lahir : {{$siswa['tanggalLahir']}}</h5>
                <h5>Alamat : {{$siswa['alamat']}}</h5>
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
                        <td>UjianBiasa</td>
                        <td>10%</td>
                        <td>70</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Pengayaan Materi Bandwidth</td>
                        <td>UjianBiasa</td>
                        <td>10%</td>
                        <td>70</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Pengayaan Materi Latency</td>
                        <td>UjianBiasa</td>
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