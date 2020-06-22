@extends('layouts.main-waka')

@section('judul')
Data Pelatih | E-Smanpul
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
      		<div class="row">
                <div class="col-xl-9 ml-auto mr-auto text-left ">
	      			<h4 class="card-title">Daftar Pelatih Ekskul</h4>
	      			<p class="card-category">
						Berikut adalah tabel data yang berisi daftar semua pelatih ekstrakurikuler aktif dan tidak aktif<br>Anda bisa menambahkan data baru dengan mengklik tombol "Tambah Pelatih Baru"
					</p>
	      		</div>
	      		<div class="col-md-3 ml-auto mr-auto text-right">
	      			<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#daftarEkskul">
			  			Tambah Pelatih Baru
					</button>
	      		</div>
      		</div>
		</div>
		<div class="card-body">
			<div class="table-responsive-lg table-full-width"> 
				<table class="table table-shopping" id="tabel_daftar_pelatih">
					<thead>
						<tr>				    						 
							<th scope="col">No</th>
							<th scope="col">Nama Pelatih</th>
							<th scope="col">Jenis Kelamin</th>
							<th scope="col">No Telepon</th>
							<th scope="col">Status</th>						
							<th scope="col">Aksi</th>
						</tr>     						
					</thead>
				</table>  			
			</div>
		</div>
	</div>
</div>

<!-- Model Tambah Pelatih Baru -->
<div class="modal fade" id="daftarEkskul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelatih Baru</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
        		</button>
      		</div>
	      	<div class="modal-body">
		        <form action="/waka/tambah-pelatih" method="POST">
		        	@csrf
	        		<div class="form-group">
	        			<div class="row mx-0">			        		
			        		<div class="col-sm-12">
			        			<label for="inputNamaEkskul">Nama Pelatih <span style="color: red">*</span> </label>
							    <input type="text" name="inputNamaPelatih" class="form-control" id="inputNamaPelatih" placeholder="Masukan nama lengkap pelatih">
			        		</div>
			        	</div>
		        	</div>

		        	<div class="form-group">
	        			<div class="row mx-0">			        		
			        		<div class="col-sm-12">
			        			<label for="inputNoTelepon">No Telepon</label>
							    <input type="text" name="inputNoTelepon" class="form-control" id="inputNoTelepon" placeholder="Masukan nomor telepon">
			        		</div>
			        	</div>
		        	</div>

		        	<div class="form-group">
		        		<div class="col-md-12">
		        			<label for="selectJenisKelamin">Jenis Kelamin <span style="color: red">*</span></label>
				        	<select class="form-control" style="width: 100%" name="selectJenisKelamin" id="selectJenisKelamin">
				        		<option hidden>-- Pilih jenis kelamin --</option>
				        		<option value="Laki-Laki">Laki-Laki</option>
				        		<option value="Perempuan">Perempuan</option>
							</select>
		        		</div>
		        	</div>

		        	<div class="form-group">
	        			<div class="row mx-0">			        		
			        		<div class="col-sm-12">
			        			<label for="inputUsername">Username <span style="color: red">*</span> </label>
							    <input type="text" name="inputUsername" class="form-control" id="inputUsername" placeholder="Masukan username">
			        		</div>
			        	</div>
		        	</div>

		        	<div class="form-group">
	        			<div class="row mx-0">			        		
			        		<div class="col-sm-12">
			        			<label for="inputPassword">Password <span style="color: red">*</span> </label>
							    <input type="password" name="inputPassword" class="form-control" id="inputPassword" placeholder="Masukan password">
			        		</div>
			        	</div>
		        	</div>
				    <div class="modal-footer" style="padding:1px">
				        <button type="button" class="btn btn-primary btn-neutral" data-dismiss="modal">Kembali</button>
				        <button type="submit" class="btn btn-success">Simpan Data</button>
				    </div>
				</form>
		    </div>
		</div>
  	</div>
</div>
@endsection

@section('customJS')
<script type="text/javascript">
	$("#pelatih").addClass('active');

	$(document).ready(function(){
		$('#tabel_daftar_pelatih').DataTable({		
			processing: true,
			serverSide: true,
			responsive: false,
			searching: true,

			language:{
				url : "{{ asset('indonesia.json') }}",
			},

			ajax:"{{ route('waka_get_data_pelatih') }}",
			columns:[	
				{data:'DT_RowIndex', name:'No', orderable:false, width:'1%', className:'text-center'},
				{data:'name'},
				{data:'jenis_kelamin', name:'jenis_kelamin'},
				{data:'no_telepon', name:'no_telepon'},
				{data:'status', name:'status', className:'text-center'},
				{data:'aksi', name:'aksi', orderable:false, className:'text-center'},						
			]});
	});   
</script>
@endsection