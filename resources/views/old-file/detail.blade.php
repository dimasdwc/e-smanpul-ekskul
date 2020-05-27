@extends('layouts.main')

@section('judul')
Pelatih | E-Smanpul
@endsection  

@section('judul_head') 
Data Pelatih
@endsection

@section('content')
<div class="col-md-4 d-flex">
	<div class="card card-user">
	  <div class="image">
	    <img src="{{ asset('paper/assets/img/damir-bosnjak.jpg') }}" alt="...">
	  </div>
	  <div class="card-body">
	    <div class="author">	     
	        <img class="avatar border-gray w-75 h-75" src="{{ asset('avatar/mike.jpg') }}" alt="...">
	        <h5 class="title"> {{$pelatih->nama_user}} </h5>	  
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
	          <h6>12<br><small>Pertemuan</small></h6>
	        </div>
	        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
	          <h6>2<br><small>Anggota</small></h6>
	        </div>
	        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
	          <a href="#" class="">See all</a>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>

<!-- Card Profil -->
<div class="col-md-8 flex-fill">
	<div class="card card-user">
	  <div class="card-header">
	    <h5 class="card-title">Profil Pelatih</h5>
	  </div>
	  <div class="card-body">
	    <form>
	      <div class="row">
	      	<div class="col-md-12 pr-1">
		      	<ul class="list-group list-group-flush list-group-item-action active">
				  	<li class="list-group-item list-group-item-action border-0">Cras justo odio</li>
				  	<li class="list-group-item list-group-item-action border-0">Dapibus ac facilisis in</li>
				  	<li class="list-group-item list-group-item-action border-0">Morbi leo risus</li>
				  	<li class="list-group-item list-group-item-action border-0">Porta ac consectetur ac</li>
				  	<li class="list-group-item list-group-item-action border-0">Vestibulum at eros</li>
				</ul> 	
	      	</div>
	      	
	        <div class="col-md-7 pr-1">
	          <div class="form-group">
	            <label>Nama Ekskul</label>
	            <input type="text" class="form-control" disabled="" placeholder="Masukan nama ekskul" value="{{$pelatih->nama_ekskul}}">
	          </div>
	        </div>        
	        <div class="col-md-5 pl-1">
	          <div class="form-group">
	            <label for="exampleInputEmail1">Cabang Rumpun Ekskul</label>
	            <input type="text" class="form-control" disabled="" placeholder="Masukan cabang ekskul">
	          </div>
	        </div>
	      </div>
	      <div class="row">
	        <div class="col-md-12 pr-1">
	          <div class="form-group">
	            <label>Tempat Latihan</label>
	            <input type="text" class="form-control" disabled="" placeholder="Masukan tempat latihan" value=" {{$pelatih->tempat_latihan}} ">
	          </div>
	        </div>        
	      </div>
	      <div class="row">
	        <div class="col-md-12">
	          <div class="form-group">
	            <label>Nama Pembina</label>
	            <input type="text" class="form-control" placeholder="Pilih pembina" value=" {{$pelatih->id_pembina}} ">
	          </div>
	        </div>
	      </div> 

	      <div class="row">
	      	<div class="col-md-12">
	      		<ul class="list-group">  	
				  	<li class="list-group-item d-flex justify-content-between align-items-center">Jumlah Anggota Ekskul
				  		<span class="badge badge-primary badge-pill"> 11 </span>
				  	</li>
				  	<li class="list-group-item d-flex justify-content-between align-items-center">Aktif Sejak
						<span class="badge badge-primary badge-pill">14</span>
				  	</li>
				</ul>
	      	</div>
	      </div>     
	      <div class="row">
	        <div class="update ml-auto mr-auto">
	          <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
	        </div>
	      </div>
	    </form>
	  </div>
	</div>
</div>  
  		
@endsection

@section('customJS')
@endsection