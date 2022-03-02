<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS in directory -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    {{-- css --}}
        {{-- navigasi --}}
        <link rel="stylesheet" href="css/navigasi.css">
        <link rel="stylesheet" href="css/style.css">
        {{-- icon --}}
        {{-- <link rel="stylesheet" href="css/boxicons.min.css">     --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        
    
    {{-- javascript --}}
        {{-- jquery --}}
        <script src="js/jquery-3.6.0.min.js"></script>
        {{-- navigasi --}}
        <script src="js/navigasi.js"></script>

    <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <title>Gurci Examp</title>
  </head>
  <body id="body-pd">
    
    {{-- notif --}}
    <div class="container">
        <div class="row">
          <div class="col text-center">
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                  <strong>{{ $message }}</strong>
              </div>
            @endif
  
            @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
              </div>
            @endif
  
            @if ($message = Session::get('warning'))
              <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
            </div>
            @endif
  
            @if ($message = Session::get('info'))
              <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
              </div>
            @endif
          </div>
        </div>
    </div>

    {{-- Header --}}
    <header class="header" id="header">
        <div class="header_toggle "> <i class='bx bx-menu' id="header-toggle" ></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>

    {{-- sidebar --}}
    <div class="l-navbar" id="nav-bar">
        <nav class="nav sidebar">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Gurci Examp</span> </a>
                <div class="nav_list"> 
                    <a href="#" onclick="dashboard('ridho')" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                    <a href="#" onclick="penilaian('ridho')" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Penilaian</span> </a> 
                    <a href="#" onclick="about('ridho')" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">About Us</span> </a> 
                    {{-- <a href="#" onclick="message('ridho')" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> 
                    <a href="#" onclick="dashboard('ridho')" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> 
                    <a href="#" onclick="users('ridho')" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a>  --}}
                </div>
            </div> 
            @if (!session('session_login'))
                <a href="#" class="nav_link" data-bs-toggle="modal" data-bs-target="#login"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Login</span> </a>
            @else
                <a href="#" id="buttonSignOut" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
            @endif
        </nav>
    </div>
    
    <!--Container Main start-->
    <div class="isisidebar height-100 bg-light">
            @yield('content')
    </div>
    <!--Container Main end-->
    
    {{-- Modal --}}
    <div class="container-fluid">

        <!-- Modal Login -->
        <div class="modal fade showfl" id="login" tabindex="99" aria-labelledby="loginLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content showfl">
                    <div class="modal-header">
                    <h5 class="modal-title" id="loginLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('login')}}" method="POST">

                            @csrf

                            <div class="mb-3">
                              <label for="email" class="form-label">Email address</label>
                              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" name="password" class="form-control" id="passwordLogin">
                            </div>
                            {{-- <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> --}}
                            <div class="mb-3 form-check text-center">
                              <p>Ingin membuat akun? <a href="#" data-bs-toggle="modal" data-bs-target="#daftar"><span>Daftar</span></a></p>
                            </div>
                            <div class="buttonsubmit text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Modal Sign Up --}}
        <div class="modal fade" id="daftar" tabindex="-1" aria-labelledby="daftarLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="daftarLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                <form action="/signUp" method="post">
                  @csrf

                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                  </div>
                  <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" name="nip" class="form-control" id="nip">
                  </div>

                  <hr>

                  <div class="mb-3 text-center">
                    <div class="form-text">Ingat email dan password dibawah untuk melakukan login!</div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                  </div>
                  <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
                  </div>
                  <div class="buttonsubmit text-center">
                    <button type="submit" class="btn btn-primary" id="submitDaftar">Submit</button>
                  </div>
                </form>
              </div>
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

    </div>
    
    {{-- bundle js bootstrap 5 in directory --}}
    <script src="js/bootstrap.bundle.min.js" rel="stylesheet"></script>

  </body>


        
</html>