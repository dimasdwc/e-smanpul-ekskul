@extends('layouts.main-waka')

@section('judul')
  	Profil Pelatih | E-Smanpul
@endsection  

@section('content')
<div class="col-md-4 d-flex">
	<div class="card card-user">
	  <div class="image">
	    <img src="{{ asset('paper/assets/img/damir-bosnjak.jpg') }}" alt="...">
	  </div>
	  <div class="card-body">
	    <div class="author">	     
	        <img class="avatar border-gray  " src="{{ asset('avatar/mike.jpg') }}" alt="...">
	        <h5 class="title"> {{ $pelatih->name }} </h5>	  
	      <p class="description">	  
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
	          <h6>{{ $pertemuan }}<br><small>Pertemuan</small></h6>
	        </div>
	        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
		      <h6>{{ $anggota }}<br><small>Anggota</small></h6>
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
	    <h5 class="card-title">Profil Pelatih</h5>
	  </div>
	  <div class="card-body">
	      <div class="row">
	      	<dl class="row ml-2">
				  <dt class="col-sm-4">Nama Lengkap :</dt>
				  <dd class="col-sm-8"> {{ $pelatih->name }}</dd>

				  <dt class="col-sm-4">Jenis Kelamin :</dt>
				  <dd class="col-sm-8">{{ $pelatih->jenis_kelamin }}</dd>

				  <dt class="col-sm-4">Tanggal Lahir :</dt>
				  <dd class="col-sm-8">{{ $pelatih->tanggal_lahir }}</dd>

				  <dt class="col-sm-4">Tempat Lahir :</dt>
				  <dd class="col-sm-8">{{ $pelatih->tempat_lahir }}</dd>

				  <dt class="col-sm-4">Jabatan :</dt>
				  <dd class="col-sm-8">{{ $pelatih->jabatan }}</dd>

				  <dt class="col-sm-4">No Telepon :</dt>
				  <dd class="col-sm-8">{{ $pelatih->no_telepon }}</dd>		

				  <dt class="col-sm-4">Alamat :</dt>
				  <dd class="col-sm-8">{{ $pelatih->alamat }}</dd>	 

				  <dt class="col-sm-4">Pendidikan Terakhir :</dt>
				  <dd class="col-sm-8">{{ $pelatih->detail_pelatih->pendidikan }} </dd>	 

				  <dt class="col-sm-4">Pengalaman Mengajar :</dt>
				  <dd class="col-sm-8">{{ $pelatih->detail_pelatih->pengalaman }}</dd>	 
				</dl>
			</div>	        	     
	      <div class="card-footer">	
	      	<hr>
		       <div class="button-container">
		          <button type="submit" class="btn btn-primary btn-round">Update Data</button>	        
		       	
		       </div>        
	      </div>
	  </div>
	</div>
</div>  
  		
@endsection

@section('customJS')
<script type="text/javascript">
$("#pelatih").addClass('active ');
</script>
@endsection