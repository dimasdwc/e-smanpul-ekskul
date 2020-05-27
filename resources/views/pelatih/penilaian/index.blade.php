@extends('layouts.main-pelatih')

@section('judul')
  	Data Penilaian | E-Smanpul
@endsection  

@section('content')		
<div class="col-md-12">
	@if(session('sukses'))
		<div class="alert alert-success" role="alert">
  			{{ session('sukses') }}
		</div>
	@endif
	
 	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Daftar Anggota</h5> 
			<p class="card-category">
				Tambahkan penilaian anggota dengan memilih anggota dan mengklik tombol "Pilih".
			</p>
			<hr>
		</div>
		<div class="card-body">
			<div class="table-responsive-lg"> 
				<table class="table table-hover"  id="tabel_penilaian_anggota">
					<thead>
						<tr>				    						 
							<th scope="col">No</th>						
							<th scope="col">Nama Lengkap</th>							
							<th scope="col">Kelas</th>						
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

<div class="col-md-12">
 	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Riwayat Penilaian</h5> 
			<p class="card-category">
				Anda bisa menghapus data penilaian dengan mengklik tombol "Hapus" pada form data
			</p>
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

@endsection

@section('customJS')
<script type="text/javascript">
	$("#penilaian").addClass('active');

	$('#tabel_penilaian_anggota').DataTable({		
		processing: true,
		serverSide: true,
		responsive: true,
		searching: true,

		ajax:"{{ route('get_data_penilaian_anggota') }}",
		columns:[	
			{data:'DT_RowIndex', name:'id'},		
			{data:'nama_lengkap', name:'nama_lengkap'},			
			{data:'kelas', name:'kelas'},						
			{data:'aksi', name:'aksi'},						
		]
	});

	$('#tabel_riwayat_penilaian_anggota').DataTable({		
		processing: true,
		serverSide: true,
		responsive: true,
		searching: true,

		ajax:"{{ route('get_data_riwayat_penilaian') }}",
		columns:[	
			{data:'DT_RowIndex', name:'id'},		
			{data:'nama_lengkap', name:'nama_lengkap'},			
			{data:'kelas', name:'kelas'},						
			{data:'tahun_ajaran', name:'tahun_ajaran'},
			{data:'deskripsi', name:'deskripsi'},						
			{data:'predikat', name:'predikat'},						
			{data:'aksi', name:'aksi'},						
		]
	});
</script>
@endsection