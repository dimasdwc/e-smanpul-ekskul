@extends('layouts.main-pelatih')

@section('judul')
  	Data Anggota | E-Smanpul
@endsection  

@section('content')	
<div class="col-md-4 d-flex">
	<div class="card card-user">
	  <div class="image">
	   	<img src="{{ asset('paper/assets/img/damir-bosnjak.jpg') }}" alt="...">
	  </div>
	  <div class="card-body">
	    <div class="author">	     
	        <img class="avatar border-gray " src="{{ asset('avatar/default.png') }}" alt="...">
	        <h5 class="title">{{ $data_anggota->siswa_ekskul->nama_lengkap }}</h5>	     
	      <p class="description">
	        <h4 class="title">{{ $kelas_siswa }}</h4> 
	      </p>
	    </div>
	  </div>
	</div>
</div>

<div class="col-md-8 d-flex">
	<div class="card card-user">
	  <div class="card-header">
	    <h5 class="card-title">Profil Anggota</h5>
	  </div>
	  <div class="card-body">	   
	      	<div class="col-md-12">
	      		<dl class="row">
					  <dt class="col-sm-4">Nama Lengkap :</dt>
					  <dd class="col-sm-8"> {{ $data_anggota->siswa_ekskul->nama_lengkap }}</dd>

					  <dt class="col-sm-4">Jenis Kelamin :</dt>
					  <dd class="col-sm-8">{{ $data_anggota->siswa_ekskul->jenis_kelamin }}</dd>

					  <dt class="col-sm-4">Tempat & Tanggal Lahir :</dt>
					  <dd class="col-sm-8">{{  $data_anggota->siswa_ekskul->tempat_lahir.", ". $data_anggota->siswa_ekskul->tanggal_lahir }}</dd>

					  <dt class="col-sm-4">Alamat :</dt>
					  <dd class="col-sm-8">{{ $data_anggota->siswa_ekskul->alamat }}</dd>				  
					</dl>	      		
	      	</div>   	      
	  </div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h6 class="card-title">Riwayat Absensi</h6>
			<hr>	      
		</div>
		<div class="card-body">			
    		<div class="table-responsive">     	
        		<table class="table table-hover" id="tabel_riwayat_absensi_anggota">
					<thead>
						<tr>				    						 
							<th scope="col">No</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Waktu</th>								
							<th scope="col">Status</th>
							<th scope="col">Aksi</th>										
						</tr>     						
					</thead>
				</table>  
			</div>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h6 class="card-title">Riwayat Penilaian</h6>
			<hr>	      
		</div>
		<div class="card-body">
			<div class="table-responsive-lg"> 
				<table class="table table-hover"  id="tabel_riwayat_penilaian_anggota">
					<thead>
						<tr>				    						 
							<th scope="col">No</th>						
							<th scope="col">Nama Lengkap</th>							
							<th scope="col">Kelas</th>						
							<!-- <th scope="col">Nama Ekskul</th> -->
							<th scope="col">Tahun Ajaran</th>						
							<th scope="col">Deskripsi</th>						
							<th scope="col">Predikat</th>						
							<th scope="col">Aksi</th>										
						</tr>     						
					</thead>
					<tbody>															
					</tbody>				
				</table>  			
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="siswa_id" value="{{$data_anggota->siswa_id}}">

@endsection

@section('customJS')
<script type="text/javascript">
	$("#anggota").addClass('active');
	var siswa_id = $('#siswa_id').val();
	// alert(siswa_id);


	$('#tabel_riwayat_penilaian_anggota').DataTable({		
		processing: true,
		serverSide: true,
		responsive: true,
		lengthChange: false,
		searching: false,
		order:[
				[3,'asc']
			],

		ajax:"{{ url('pelatih/getpenilaian_anggota') }}"+"/"+siswa_id,
		columns:[	
			{data:'DT_RowIndex', name:'id', orderable:false, width:'1%', className:'text-center'},		
			{data:'nama_lengkap', name:'nama_lengkap', orderable:false},			
			{data:'kelas', name:'kelas', orderable:false},						
			{data:'tahun_ajaran', name:'tahun_ajaran'},
			{data:'deskripsi', name:'deskripsi', orderable:false},						
			{data:'predikat', name:'predikat', orderable:false},						
			{data:'aksi', name:'aksi', orderable:false},						
		]
	});

	$('#tabel_riwayat_absensi_anggota').DataTable({		
		processing: true,
		serverSide: true,
		responsive: true,
		order:[
				[1,'desc']
			],


		ajax:"{{ url('pelatih/getabsensi_anggota') }}"+"/"+siswa_id,
		columns:[	
			{data:'DT_RowIndex', name:'id', orderable:false, width:'1%', className:'text-center'},		
			{data:'tanggal', name:'nama_lengkap', orderable:false},			
			{data:'jam_absen', name:'jam_absen', orderable:false},			
			{data:'status', name:'status', orderable:false},						
			{data:'aksi', name:'aksi', orderable:false},						
		]
	});
</script>
@endsection