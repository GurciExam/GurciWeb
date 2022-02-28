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
        {{-- icon --}}
        {{-- <link rel="stylesheet" href="css/boxicons.min.css">     --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        
    
    {{-- javascript --}}
        {{-- jquery --}}
        <script src="js/jquery-3.6.0.min.js"></script>
        {{-- navigasi --}}
        <script src="js/navigasi.js"></script>

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

    {{-- utama --}}
    <header class="header" id="header">
        <div class="header_toggle "> <i class='bx bx-menu' id="header-toggle" ></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Gurci Examp</span> </a>
                <div class="nav_list"> 
                    <a href="#" onclick="dashboard('ridho')" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                    <a href="#" onclick="penilaian('ridho')" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Penilaian</span> </a> 
                    <a href="#" onclick="files('ridho')" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">About Us</span> </a> 
                    {{-- <a href="#" onclick="message('ridho')" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> 
                    <a href="#" onclick="dashboard('ridho')" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> 
                    <a href="#" onclick="users('ridho')" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a>  --}}
                </div>
            </div> 
            @if (!session('session_login'))
                <a href="#" class="nav_link" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Login</span> </a>
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
    
    <div class="container-fluid">
        <!-- Modal -->
        <div class="modal fade showfl" id="exampleModal" tabindex="99" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content showfl">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
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
                              <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <div class="buttonsubmit text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
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