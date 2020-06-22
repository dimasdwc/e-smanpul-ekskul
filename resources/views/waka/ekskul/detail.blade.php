@extends('layouts.main-waka')

@section('judul')
  	Profil | E-Smanpul
@endsection  

@section('content')
<div class="col-md-4 d-flex">
	<div class="card card-user">
	  <div class="image">
	    <img src="{{ asset('paper/assets/img/damir-bosnjak.jpg') }}" alt="...">
	  </div>
	  <div class="card-body">
	    <div class="author">	     
	        <img class="avatar border-gray" src="{{ asset('avatar/default.jpg') }}" alt="Foto profil pengguna">
	        <h5 class="title text-primary"> {{ Auth::user()->name }} </h5>	 
	        <p class="text-default text-center">
	        	{{ Auth::user()->no_telepon }}
	        </p> 
	      	<p class="text-muted text-center">	
				{{ Auth::user()->jenis_kelamin }} <br>
			  	{{ Auth::user()->tanggal_lahir }} <br>
			  	{{ Auth::user()->alamat }} <br>
	      	</p>
	    </div>
	    {{-- <p class="description text-center">
	      Laki-Laki <br>
	      No Telepon <br>
	      Alamat <br>
	    </p> --}}
	  </div>
	  <div class="card-footer">	    
	  	<hr>
	    <div class="button-container">
	      <div class="row">
	        <div class="col-lg-4 col-md-6 col-6 ml-auto ">
	          <h6> {{$jumlah_pertemuan}} <br><small>Pertemuan</small></h6>
	        </div>
	        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
	          <h6> {{ $jumlah_anggota }} <br><small>Anggota</small></h6>
	        </div>	        
	      </div>
	    </div>
	  </div>
	</div>
</div>

<!-- Card Profil -->
<div class="col-md-8 d-flex">
	<div class="card card-user">
	  	<div class="card-header">
	    	<h5 class="card-title">Profil Ektrakurikuler</h5>
	  	</div>
	  	<div class="card-body">
			<div class="table-responsive-lg"> 
				<table class="table table-striped" style="width: 100%" id="tabel_daftar_ekskul">
					<tbody>
						<tr>
							<td scope="col">No</td>
							<td scope="col">:</td>
							<td scope="col">Nama Ekskul</td>
						</tr>
						<tr>
							<td scope="col">Nama Ekskul</td>
							<td scope="col">:</td>
							<td scope="col">Pembina</td>
						</tr>
						<tr>
							<td scope="col">No</td>
							<td scope="col">:</td>
							<td scope="col">Pembina</td>
						</tr>
					</tbody>
				</table>  			
			</div>
	 	</div>
 		<div class="card-footer">	
			<div class="button-container">
				<button type="submit" class="btn btn-primary btn-round">Perbarui Data</button>
			</div>        
	    </div>
	</div>
</div>  
  		
@endsection

@section('customJS')
<script type="text/javascript">
$("#daftar_ekskul").addClass('active ');
</script>
@endsection