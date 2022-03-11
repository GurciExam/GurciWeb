@for ($i = 0; $i < $banyakSoal; $i++)
   <div class="card persoal m-2">
    
        <div class="card-body">
            <h4 class="text-center">Soal ke {{$i + 1}}</h4>

            <div class="form-group mb-3">
                {{-- <div class="inputSoal mb-3">
                    <label for="formPilihan{{$i + 1}}" class="form-label">Pilihan</label>
                    <div class="btn-group me-2" role="group" aria-label="First group" id="formPilihan{{$i + 1}}">
                        <button name="pilihan[{{$i}}]" type="button" value="A" class="btn btn-outline-secondary">A</button>
                        <button name="pilihan[{{$i}}]" type="button" value="B" class="btn btn-outline-secondary">B</button>
                        <button name="pilihan[{{$i}}]" type="button" value="C" class="btn btn-outline-secondary">C</button>
                        <button name="pilihan[{{$i}}]" type="button" value="D" class="btn btn-outline-secondary">D</button>
                    </div>
                </div> --}}
                <div class="col">
                    <div id="kesimpulan" class="btn-group btn-group-toggle" data-toggle="buttons" required>
                      <label class="btn border border-dark btn-warning" style="background-color: #e0606d">
                        <input type="radio" name="pilihan[{{$i}}]" id="pilihan[{{$i}}]" value="A" required> A
                      </label>
                      <label class="btn border border-dark btn-warning" style="background-color: #e0d760">
                        <input type="radio" name="pilihan[{{$i}}]" id="pilihan[{{$i}}]" value="A" required> B
                      </label>
                      <label class="btn border border-dark btn-warning" style="background-color: #64af75">
                        <input type="radio" name="pilihan[{{$i}}]" id="pilihan[{{$i}}]" value="B" required> C
                      </label>
                      <label class="btn border border-dark btn-warning" style="background-color: #62acb8">
                        <input type="radio" name="pilihan[{{$i}}]" id="pilihan[{{$i}}]" value="C" required> D
                      </label>
                    </div>
                  </div>
            </div>

            <div class="form-group mb-3">
                <label for="summernote">Soal</label>
                <div class="textarea" style="background-color: white; color:black; margin-bottom:30px;">
                    <textarea class="summernoteSoal" name="soalUjian[{{$i}}]"></textarea>
                </div>
            </div>
        
            <div class="form-group mb-3">
                <label for="summernote">Deskripsi Jawaban</label>
                <div class="textarea" style="background-color: white; color:black; margin-bottom:30px;">
                    <textarea class="summernoteJawaban" name="deskripsiJawaban[{{$i}}]"></textarea>
                </div>
            </div>
        </div>

    </div> 

    <script>
        $('.summernoteSoal').summernote({
            placeholder: 'Masukkan Soal',
            tabsize: 2,
            height: 100
        });

        $('.summernoteJawaban').summernote({
            placeholder: 'Masukkan Jawaban',
            tabsize: 2,
            height: 100
        });
    </script>
@endfor

