<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icon/smanpul/logo_smanpul_48x48.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('icon/smanpul/logo_smanpul_48x48.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <title>
    @yield('judul')
  </title>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="{{ asset('font/google_font.css') }}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{ asset('paper/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('paper/assets/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />  
  {{-- <link href="{{ asset('paper/assets/css/paper-dashboard.css') }}" rel="stylesheet" />   --}}
  <link href="{{ asset('font-awesome/css/fontawesome.min.css') }}" rel="stylesheet">

  <!-- Datatables -->
  <link rel="stylesheet" href=" {{ asset('datatables/css/jquery.dataTables.min.css') }} "> 

  <!-- Perfect Scrollbar -->
  <link rel="stylesheet" href=" {{ asset('css/perfect-scrollbar.css') }} ">
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="/" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ asset('icon/icon-small.png') }}">
          </div>
        </a>
        <a href="/" class="simple-text logo-normal">
          EKSKUL | E-SMANPUL        
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li id="profil" >
            <a href="{{ url('/profil') }}">
              <i class="nc-icon nc-circle-10"></i>
              <p>Profil Saya</p>
            </a>
          </li>          
          <li id="siswa">
            <a href="{{ url('/siswa') }}">
              <i class="nc-icon nc-badge"></i>
              <p>Data Siswa</p>
            </a>
          </li>

          <li id="daftar_ekskul">
            <a href="{{ url('/ekskul') }}">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Data Ekskul</p>
            </a>
          </li>

          <li id="pengguna">
            <a href="{{ url('/pelatih') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Data Pelatih</p>
            </a>
          </li>
          <!--  <li id="absensi" >
            <a href="{{ url('/') }}">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>Data Absensi Pelatih</p>
            </a>
          </li>   -->
          <!-- <li id="absensi" >
            <a href="{{ url('/') }}">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>Data Absensi Siswa</p>
            </a>
          </li>  -->
          
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
          <li id="pengguna">
            <a href="{{ url('/users') }}">
              <i class="nc-icon nc-circle-10"></i>
              <p>Jadwal Ekskul</p>
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
            <a class="navbar-brand" href="">@yield('judul_head')</a>
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
                     {{ Auth::user()->name }}
                  </p>
                </a>
              </li>
               
              <li class="nav-item">
                <a class="nav-link btn-magnify" href=" {{ route('logout') }} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <p>
                    <span class="d-lg-none d-md-block"></span>
                    LOGOUT
                    <form id="logout-form" action=" {{ route('logout') }} " method="POST" style="display: none;">
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


  <!--   Core Paper JS Files   -->
  <script src="{{ asset('paper/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('paper/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('paper/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('paper/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script> 
  {{-- <script src="{{ asset('paper/assets/js/plugins/bootstrap-notify.js') }}"></script> --}}
  
  <!-- Datatables -->
  <script src=" {{ asset('datatables/js/jquery.dataTables.min.js') }} "></script>

  <!-- Perfect Scrollbar -->
  <script src=" {{ asset('js/perfect-scrollbar.js') }} "></script>
  
  <!-- Paper Dashboard -->
  <script src="{{ asset('paper/assets/js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>
  {{-- <script src="{{ asset('paper/assets/js/paper-dashboard.min.js') }}" type="text/javascript"></script> --}}

  <script src="{{ asset('Buttons-1.5.6/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('Buttons-1.5.6/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('JSZip-2.5.0/jszip.min.js') }}"></script>
  <script src="{{ asset('pdfmake-0.1.36/pdfmake.min.js') }}"></script>
  <script src="{{ asset('pdfmake-0.1.36/vfs_fonts.js') }}"></script>
  <script src="{{ asset('Buttons-1.5.6/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('Buttons-1.5.6/js/buttons.print.min.js') }}"></script>

  @yield('customJS')
</body>

</html>