<div class="container-float">
    <div class="row">
        <div class="col">
            <h1>Dashboard</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <h1 class="text-center">Welcome to Gurci Exam</h1>
            @if (session('session_login'))
                <h3 class="text-center mt-5">SUDAH LOGIN dengan {{session('data')['email']}} 🔥🔥</h3>
            @else
                <h3 class="text-center mt-5">LOGIN DULU NGAB!!</h3>

                <h4 class="text-center mt-5"> Di sidenav kiri paling bawah yak... 🙂🙂</h4>
            @endif
        </div>
    </div>
</div>

