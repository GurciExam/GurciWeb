<h1 class="text-center mt-2">Rekapitulasi Kelas</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <input class="form-control" type="search" placeholder="Search Siswa.." aria-label="Search" id="textSearchRekap" name="textSearchRekap">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Ujian Biologi</th>
                      <th scope="col">Ujian Kimia</th>
                      <th scope="col">Rata" Ujian Harian (30%)</th>
                      <th scope="col">UTS (30%)</th>
                      <th scope="col">UAS (40%)</th>
                      <th scope="col">Nilai Akhir</th>
                    </tr>
                  </thead>
                  <tbody id="listRekapSiswa">
                        <?php $i = 1; ?>
                        @foreach ($Siswa as $item)
                          
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td id="">{{$item['namaSiswa']}}</td>
                                <td>{{$i*10}}</td>
                                <td>{{$i*10}}</td>
                                <td>{{$i*10}}</td>
                                <td>{{$i*10}}</td>
                                <td>{{$i*10}}</td>
                                <td>{{$i*10*3}}</td>
                            </tr>

                            <?php $i++; ?>

                        @endforeach
                        
                  </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // search Rekap Siswa
    $("#textSearchRekap").on("keyup change", function() {
        var value = $(this).val().toLowerCase();

        $("#listRekapSiswa tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });

    });
</script>