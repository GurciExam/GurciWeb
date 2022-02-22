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
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Gurci Examp</span> </a>
                <div class="nav_list"> 
                    <a href="#" onclick="dashboard('ridho')" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                    <a href="#" onclick="penilaian('ridho')" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Penilaian</span> </a> 
                    <a href="#" onclick="files('ridho')" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> 
                    <a href="#" onclick="message('ridho')" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> 
                    <a href="#" onclick="dashboard('ridho')" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> 
                    <a href="#" onclick="users('ridho')" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
                </div>
            </div> 
            <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="isisidebar height-100 bg-light">
        @yield('content')
        {{-- field Content Showed --}}
    </div>
    <!--Container Main end-->
    
    
    {{-- bundle js bootstrap 5 in directory --}}
    <script src="js/bootstrap.bundle.min.js" rel="stylesheet"></script>

  </body>
</html>