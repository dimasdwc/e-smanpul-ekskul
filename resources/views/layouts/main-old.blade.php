<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icon/icon1.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('icon/icon1.png') }}">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <title>
    @yield('judul')
  </title>
  
  <!--     CSS     -->
  <link rel="stylesheet" href="{{ asset('paper/assets/css/paper-dashboard.css?v=2.0.0') }}">
  <link rel="stylesheet" href="{{ asset('paper/assets/css/bootstrap.min.css') }}">
  
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('font/fontawesome.min.css') }}" />  
  <link rel="stylesheet" href="{{ asset('font/google_font.css') }}" />  
  <link rel="shortcut icon" href="{{ asset('icon/icon1.png') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('icon/icon1.png') }}" type="image.png">

  {{-- Datatables --}}
  <link rel="stylesheet" href="{{asset('datatables/css/datatables.bootstrap.css')}} ">
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ asset('icon/icon1.png') }}">
          </div>
        </a>
        <a href="" class="simple-text logo-normal">
          User
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>

      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="/">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href=" {{ url('/users') }} ">
              <i class="nc-icon nc-diamond"></i>
              <p>Data Pengguna</p>
            </a>
          </li>
          <li>
            <a href=" {{ url('/siswa')}} ">
              <i class="nc-icon nc-pin-3"></i>
              <p>Data Siswa</p>
            </a>
          </li>
          <li>
            <li>
            <a href="./typography.html">
              <i class="nc-icon nc-caps-small"></i>
              <p>Jadwal Ekskul</p>
            </a>
          </li>
          <li>
            <a href=" {{ url('/ekskul')}} ">
              <i class="nc-icon nc-bell-55"></i>
              <p>Daftar Ekskul</p>
            </a>
          </li>
          <li>
            <a href=" {{ url('/deskpenilaian')}} ">
              <i class="nc-icon nc-caps-small"></i>
              <p>Data Deskripsi Penilaian</p>
            </a>
          </li>        
          <li>
            <a href="./user.html">
              <i class="nc-icon nc-single-02"></i>
              <p>Data Penilaian Siswa</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="nc-icon nc-caps-small"></i>
              <p>Data Absensi Siswa</p>
            </a>
          </li>
          <li>
            <a href="./tables.html">
              <i class="nc-icon nc-tile-56"></i>
              <p>Data Absensi Ekskul</p>
            </a>
          </li>
        </ul>
      </div>
    </div>  
  {{-- </div> --}}
  {{-- <header class="main-header-top hidden-print">
    <a href="{{ url('') }}" class="logo">
        <img class="img-fluid able-logo" src="{{ asset('logo.png') }}" alt="Theme-logo">
    </a> --}}
    <!-- Navbar -->
      {{-- <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#">Ekstrakulikuler | E-Smanpul</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
          </div>
        </div>
      </nav> --}}
    {{-- </header> --}}
      <!-- End Navbar -->
  </div>

  <!--   Core JS Files   -->
  <script src="{{ asset('paper/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('paper/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('paper/assets/js/plugins/perfect-scrollbar.jquery.min.js')}} "></script>

  <!-- Datatables -->
  <script src="{{ asset('datatables/js/jquery.dataTables.min.js')}} "></script>
  <script src="{{ asset('datatables/js/jquery.min.js')}} "></script>

  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->

  <!-- Chart JS -->
  <script src="{{ asset('paper/assets/js/plugins/chartjs.min.js') }} "></script>

  <!--  Notifications Plugin    -->
  <script src="{{ asset('paper/assets/js/plugins/bootstrap-notify.js') }} "></script>

  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('paper/assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript') }}"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      // demo.initChartsPages();
    });
</script>
</body>

</html>