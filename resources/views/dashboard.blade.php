@extends('layouts.main')

@section('judul')
  Dashboard | E-Smanpul
@endsection  

@section('judul_head') 
Dashboard
@endsection

@section('content')  
<div class="col-md-12">
	<div class="card text-white bg-info mb-3" style="max-width: 100%;"> 
	  	<div class="card-body">
	    	<h5 class="card-title">Hai..{{ Auth::user()->name}}</h5>
	    	<p class="card-text">Selamat Datang di Aplikasi <b>Absensi dan Penilaian Ektrakurikuler SMAN 10 Pontianak</b></p>
	    	<p>Silahkan hubungi operator sekolah jika menemukan kendala dalam proses penggunaan aplikasi ini</p>
	    	<p>Hubungi Kontak : <b>1.Dimas Dwi Cahyo (082157130433) | 2.Fikri (089693011221)</b></p>
	    	<br>
	    	<p>Terima Kasih</p>
	  	</div>
	</div>
</div>
@endsection