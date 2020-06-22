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

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
	        <h5 class="card-title">Tabel Riwayat Absensi</h5>
	        <p class="card-category">Disini anda bisa melihat semua daftar absensi yang telah dilakukan sebelumnya</p>
      	</div>
    	<div class="card-body">        
    		<div class="table-responsive-lg"> 
	        	<table class="table table-hover" id="tabel_absensi_pelatih">		
					<thead>
						<tr>				    						 
							<th scope="col">No</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Jam Masuk</th>
							<th scope="col">Jam Keluar</th>
							<th scope="col">Catatan</th>						
						</tr>     						
					</thead>		
				</table>  	
    		</div>
    	</div>
   	</div>	
</div> 
<input type="hidden" id="pelatih_id" value="{{$pelatih->id}}">
  		
@endsection

@section('customJS')
<script type="text/javascript">
$("#pelatih").addClass('active ');
	
	var pelatih_id = $('#pelatih_id').val();
	// alert(pelatih_id);

	$("#absensi_pelatih").addClass('active ');
	$(document).ready(function(){
		$('#tabel_absensi_pelatih').DataTable({

			processing: true,
			serverSide: true,
			responsive: true,
			searching: true,
			order:[
				[1,'desc']
			],

			{{-- ajax:"{{ url('pelatih/getpenilaian_anggota') }}"+"/"+siswa_id, --}}
			ajax:"{{ url('waka/waka_get_absensi_pelatih') }}"+"/"+pelatih_id,
			columns:[			
				{data:'DT_RowIndex', name:'id', orderable:false, width:'1%', className:'text-center'},	
				{data:'tanggal',name: 'tanggal'},
				{data:'jam_masuk',name: 'jam_masuk', orderable:false,},			
				{data:'jam_keluar',name: 'jam_keluar', orderable:false,},			
				{data:'catatan',name: 'catatan', orderable:false,},			
			]
		});
	});
</script>
@endsection