@extends('layouts.main')

@section('judul')
Detail Ekskul | E-Smanpul
@endsection  

@section('judul_head') 
Ekskul {{$ekskul->nama_ekskul}}
@endsection

@section('content')
<div class="col-md-4 d-flex">
	<div class="card card-user">
	  <div class="image">
	    <img src="{{ asset('paper/assets/img/damir-bosnjak.jpg') }}" alt="...">
	  </div>
	  <div class="card-body">
	    <div class="author">
	      <a href="#">
	        <img class="avatar border-gray" src="{{ asset('paper/assets/img/mike.jpg') }}" alt="...">
	        <h5 class="title">Nama Pelatih</h5>
	      </a>
	      <p class="description">
	        
	      </p>
	    </div>
	    <p class="description text-center">
	      Laki-Laki <br>
	      No Telepon <br>
	      Alamat <br>

	    </p>
	  </div>
	  <div class="card-footer">
	    <hr>
	    <div class="button-container">
	      <div class="row">
	        <div class="col-lg-4 col-md-6 col-6 ml-auto ">
	          <h6>12<br><small>Pertemuan</small></h6>
	        </div>
	        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
	          <h6>{{$jumlah_anggota}}<br><small>Anggota</small></h6>
	        </div>
	        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
	          <a href="#" class="">See all</a>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>

<div class="col-md-8 flex-fill">
	<div class="card card-user">
	  <div class="card-header">
	    <h5 class="card-title">Profil Ekskul</h5>
	  </div>
	  <div class="card-body">
	    <form>
	      <div class="row">
	        <div class="col-md-7 pr-1">
	          <div class="form-group">
	            <label>Nama Ekskul</label>
	            <input type="text" class="form-control" disabled="" placeholder="Masukan nama ekskul" value="{{$ekskul->nama_ekskul}}">
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
	            <input type="text" class="form-control" disabled="" placeholder="Masukan tempat latihan" value=" {{$ekskul->tempat_latihan}} ">
	          </div>
	        </div>        
	      </div>
	      <div class="row">
	        <div class="col-md-12">
	          <div class="form-group">
	            <label>Nama Pembina</label>
	            <input type="text" class="form-control" placeholder="Pilih pembina" value=" {{$ekskul->id_pembina}} ">
	          </div>
	        </div>
	      </div> 

	      <div class="row">
	      	<div class="col-md-12">
	      		<ul class="list-group">  	
				  	<li class="list-group-item d-flex justify-content-between align-items-center">Jumlah Anggota Ekskul
				  		<span class="badge badge-primary badge-pill"> {{$jumlah_anggota}} </span>
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

<!-- Datatables Absensi Pelatih -->
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
	    	<h5 class="card-title">Riwayat Absensi Pelatih</h5>
		</div>
		<div class="card-body">
			<table class="table table-hover" id="tabel_absen_pelatih">
				<thead>
					<tr> 
				    	{{-- <th scope="col">#</th> --}}
					  	<th scope="col">Tanggal</th>
						<th scope="col">Jam Masuk</th>						
						<th scope="col">Jam Keluar</th>						
						<th scope="col">Keterangan</th>						
					</tr>     						
				</thead>
			<tbody>				
			</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Datatables Absensi Siswa -->
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
	    	<h5 class="card-title">Riwayat Absensi Siswa</h5>
		</div>
		<div class="card-body">
			<table class="table table-hover" id="tabel_absen_siswa">
				<thead>
					<tr>				    	
					  	<th scope="col">Tanggal</th>
						<th scope="col">Jam Masuk</th>						
						<th scope="col">Jam Keluar</th>						
						<th scope="col">Nama Siswa</th>
						<th scope="col">Kelas</th>

					</tr>     						
				</thead>
			<tbody>				
			</tbody>
			</table>
		</div>
	</div>
</div>
  		
@endsection

@section('customJS')
<script type="text/javascript">
$(document).ready(function(){
	$('#tabel_absen_pelatih').DataTable({
		// dom: 'Bfrtip',
  //           buttons: ['excel', 'pdf', 'print'],

		processing: true,
		serverSide: true,
		responsive: true,
		searching: true,

		ajax:"{{ route('get_absen_pelatih') }}",
		columns:[			
			{data:'tanggal',name: 'tanggal'},
			{data:'time_in',name: 'time_in'},
			{data:'time_out',name: 'time_out'},
			{data:'catatan',name: 'catatan'}
			
		]
	});

	// JS Datatables Absen Siwa
	$('#tabel_absen_siswa').DataTable({
		// dom: 'Bfrtip',
  //           buttons: ['excel', 'pdf', 'print'],

		processing: true,
		serverSide: true,
		responsive: true,
		searching: true,

		ajax:"{{ route('get_absen_siswa') }}",
		columns:[			
			{data:'tanggal',name: 'tanggal'},
			{data:'time_in',name: 'time_in'},
			{data:'time_out',name: 'time_out'},
			{data:'siswa_id',name: 'siswa_id'},
			
			// {data:'nama_lengkap',name: 'nama_lengkap'},
			// {data:'kelas',name: 'kelas'},
			// {data:'jurusan',name: 'jurusan'}
			
		]
	});
});    
</script>
@endsection