
window.onload = dashboard(); //setelah load langsung buka tab dashboard

document.addEventListener("DOMContentLoaded", function(event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('showsd')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
            })
        }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
        if(linkColor){
        linkColor.forEach(l=> l.classList.remove('active'))
        this.classList.add('active')
        }
    }
    
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
    // Button sign out
    $('#buttonSignOut').on('click',function(){
        var konfirmasi = confirm('yakin keluar?')
        if(konfirmasi){
            window.location.href = "/logout";
        }
    })

    // button submit tambah kelas
    $('#submitTambahKelas').on('click',function () {

        $konfirmasi = confirm('Yakin Tambah?');

        if ($konfirmasi) {
            // AJAX FORM TANPA RELOAD
            $.ajax({
                type: "GET",
                url: "/tambahKelas",    //Masuk controller
                data: $("#tambahKelasform").serialize(),
                success: function(data) {
                    alert('berhasil!');

                    // panggil tampilan kembali agar refresh
                    $.get("/penilaian",{},function (data) {
                        $(".isisidebar").html(data);
                    })
                },
                error: function (data) {
                    alert('gagal!');
                }
            })
        }
        
    })
});

// Manual Code =====================================================================================

    //test
    function test() {
        alert('bisa');
    }

    //dashboard
    function dashboard() {
        $.get("/dashboard",{},function (data) {
            $(".isisidebar").html(data);
        })
    }

    //Files
    function files() {
        $.get("/files",{},function (data) {
            $(".isisidebar").html(data);
        })
    }

    //about
    function about() {
        $.get("/about",{},function (data) {
            $(".isisidebar").html(data);
        })
    }

    //Message
    function message() {
        $.get("/message",{},function (data) {
            $(".isisidebar").html(data);
        })
    }
    
    //Penilaian
    function penilaian() {
        $.get("/penilaian",{},function (data) {
            $(".isisidebar").html(data);
        })
    }

    //Users
    function users() {
        $.get("/users",{},function (data) {
            $(".isisidebar").html(data);
        })
    }
    
    //Bookmark
    function bookmark() {
        $.get("/bookmark",{},function (data) {
            $(".isisidebar").html(data);
        })
    }


    