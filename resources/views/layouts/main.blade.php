<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('ikon/ikon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('ikon/ikon.png') }}">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <title>
    @yield('judul')
  </title>

  <!--     Fonts and icons     -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> --}}
  {{-- <link href="{{ asset('font/google_font.css') }}" rel="stylesheet" /> --}}
  {{-- <link href="{{ asset('font/fontawesome.min.css') }}" rel="stylesheet" /> --}}
  {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> --}}

  <!-- CSS Files -->
  <link href="{{ asset('paper/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('paper/assets/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />  
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ asset('ikon/ikon.png') }}">
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">
          EKSKUL | E-SMANPUL        
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li id="dashboard" >
            <a href="{{ url('/') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li id="pengguna">
            <a href="{{ url('/users') }}">
              <i class="nc-icon nc-circle-10"></i>
              <p>Data Pengguna</p>
            </a>
          </li>
          <li id="siswa">
            <a href="{{ url('/siswa') }}">
              <i class="nc-icon nc-badge"></i>
              <p>Data Siswa</p>
            </a>
          </li>
          <li id="absensi" >
            <a href="{{ url('/') }}">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>Data Absensi</p>
            </a>
          </li> 
          <li id="daftar_ekskul">
            <a href="{{ url('/ekskul') }}">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Daftar Ekskul</p>
            </a>
          </li>
          <li id="nilai_siswa">
            <a href="{{ url('/') }}">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p>Penilaian Siswa</p>
            </a>
          </li>
          <li id="deskripsi_nilai" >
            <a href="{{ url('/deskripsi') }}">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Deskripsi Penilaian</p>
            </a>
          </li>             
        </ul>
      </div>
    </div>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#">@yield('judul_head')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">       
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="#">
                  <p>
                    <span class="d-lg-none d-md-block"></span>
                      Nama User
                  </p>
                </a>
              </li>
               
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <p>
                    <span class="d-lg-none d-md-block"></span>
                    LOGOUT
                    <form id="logout-form" action="" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </p>
                </a>
              </li>
            </ul>       
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      
      <div class="content">
        <div class="row">
         
            @yield('content')

        </div>
      </div>
    </div>
  </div>


  <!--   Core JS Files   -->
  <script src="{{ asset('paper/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('paper/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('paper/assets/js/core/bootstrap.min.js') }}"></script>
  <!-- <script src="{{ asset('paper/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script> -->
  <!--  Google Maps Plugin    -->
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Chart JS -->
  {{-- <script src="{{ asset('paper/assets/js/plugins/chartjs.min.js') }}"></script> --}}
  <!--  Notifications Plugin    -->
  {{-- <script src="{{ asset('paper/assets/js/plugins/bootstrap-notify.js') }}"></script> --}}
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('paper/assets/js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  {{-- <script src="{{ asset('paper/assets/demo/demo.js') }}"></script> --}}

  
      
  {{-- <script src="{{ asset('jQuery-3.3.1/jquery-3.3.1.min.js') }}"></script> --}}
  <!-- <link  href="{{ asset('DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet">
  <script src="{{ asset('DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

  <script src="{{ asset('Buttons-1.5.6/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('Buttons-1.5.6/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('JSZip-2.5.0/jszip.min.js') }}"></script>
  <script src="{{ asset('pdfmake-0.1.36/pdfmake.min.js') }}"></script>
  <script src="{{ asset('pdfmake-0.1.36/vfs_fonts.js') }}"></script>
  <script src="{{ asset('Buttons-1.5.6/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('Buttons-1.5.6/js/buttons.print.min.js') }}"></script> -->
</body>

</html>