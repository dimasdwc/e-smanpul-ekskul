@extends('layouts.main-pelatih')

@section('judul')
  	Absensi Anggota | E-Smanpul
@endsection  

@section('content')

<div class="col-md-12">
	@if(session('sukses'))
		<div class="alert alert-success" role="alert">
  			{{ session('sukses') }}
		</div>
	@endif	
</div>

<div class="col-md-12">
 	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Absensi Anggota</h5> 
			<p class="card-category">
				Silahkan lakukan absensi kehadiran anggota dengan meng-klik tombol "H" jika Hadir, dan "TH" jika Tidak Hadir.
			</p>
			<hr>
		</div>
		<div class="card-body">
			<div class="table-responsive-lg"> 
				<table class="table table-hover" id="tabel_absensi_anggota">
					<thead>
						<tr>				    						 
							<th scope="col">No</th>						
							<th scope="col">Nama</th>							
							<th scope="col">Kelas</th>						
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
	        <h5 class="card-title">Riwayat Absensi</h5>
	        <hr>		      
    	</div>
    	<div class="card-body"> 
    		<div class="table-responsive-sm">     	
        		<table class="table table-hover" id="tabel_riwayat_absensi_anggota">
					<thead>
						<tr>				    						 
							<th scope="col">No</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Waktu</th>
							<th scope="col">Nama</th>
							<th scope="col">Kelas</th>
							<th scope="col">Status</th>
							<th scope="col">Aksi</th>										
						</tr>     						
					</thead>
				</table>  
			</div>
		</div>
	</div>
</div>
	
@endsection

@section('customJS')
<script type="text/javascript">
$("#absensi_siswa").addClass('active ');
$('#tabel_absensi_anggota').DataTable({		

	processing: true,
	serverSide: true,
	responsive: true,
	searching: true,

	ajax:"{{ route('get_data_absensi_anggota') }}",
	columns:[	
		{data:'DT_RowIndex', name:'id', orderable:false, width:'1%', className:'text-center'},
		{data:'nama_lengkap', name:'nama_lengkap'},			
		{data:'kelas', name:'kelas'},						
		{data:'aksi', name:'aksi', orderable:false,},						
	]
});

$('#tabel_riwayat_absensi_anggota').DataTable({		

	processing: true,
	serverSide: true,
	responsive: true,
	searching: true,
	order:[
		[1,'desc']
	],

	ajax:"{{ route('get_data_riwayat_absensi_anggota') }}",
	columns:[	
		{data:'DT_RowIndex', name:'id', orderable:false, width:'1%', className:'text-center'},	
		{data:'tanggal', name:'tanggal'},
		{data:'jam_absen', name:'jam_absen', orderable:false,},
		{data:'nama_lengkap', name:'nama_lengkap'},
		{data:'kelas', name:'kelas'},						
		{data:'status', name:'status'},						
		{data:'aksi', name:'aksi', orderable:false,},						
	]
});

</script>

@endsection