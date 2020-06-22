@extends('layouts.main-waka')

@section('judul')
  Data Pembina | E-Smanpul
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
	      			<h4 class="card-title">Daftar Pembina Ekskul</h4>
	      			<p class="card-category">
						Berikut adalah tabel data yang berisi daftar semua Pembina ekstrakurikuler aktif dan tidak aktif<br>Anda bisa menambahkan data baru dengan mengklik tombol "Tambah Pembina Baru"
					</p>
	      		</div>
	      		<div class="col-md-3 ml-auto mr-auto text-right">
	      			<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#daftarEkskul">
			  			Tambah Pembina Baru
					</button>
	      		</div>
      		</div>
		</div>
		<div class="card-body">
			{{-- <div class="table-responsive-lg">  --}}
				<table class="table table-hover compact display nowrap" style="width: 100%" id="tabel_daftar_pembina">
					<thead>
						<tr>				    						 
							<th scope="col">No</th>
							<th scope="col">Nama pembina</th>
							<th scope="col">Jabatan</th>						
							<th scope="col">Jenis Kelamin</th>
							<th scope="col">No Telepon</th>
							<th scope="col">Aksi</th>
						</tr>     						
					</thead>
				</table>  			
			</div>
		{{-- </div> --}}
	</div>
</div>

<!-- Model Tambah pembina Baru -->
<div class="modal fade" id="daftarEkskul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Tambah Pembina Baru</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
        		</button>
      		</div>
	      	<div class="modal-body">
		        <form action="/waka/tambah-pembina" method="POST">
		        	@csrf
	        		<div class="form-group">
	        			<div class="row mx-0">			        		
			        		<div class="col-sm-12">
			        			<label for="inputNamaEkskul">Nama Pembina <span style="color: red">*</span> </label>
							    <input type="text" name="inputNamapembina" class="form-control" id="inputNamaPelatih" >
			        		</div>
			        	</div>
		        	</div>

		        	<div class="form-group">
	        			<div class="row mx-0">			        		
			        		<div class="col-sm-12">
			        			<label for="inputNoTelepon">No Telepon</label>
							    <input type="text" name="inputNoTelepon" class="form-control" id="inputNoTelepon" >
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
			        			<label for="inputUsername">Jabatan <span style="color: red">*</span> </label>
							    <input type="text" name="inputUsername" class="form-control" id="inputUsername" >
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
	$("#pembina").addClass('active');

	$(document).ready(function(){
		$('#tabel_daftar_pembina').DataTable({		
			processing: true,
			serverSide: true,
			responsive: true,
			searching: true,

			language:{
				url : "{{ asset('indonesia.json') }}",
			},

			ajax:"{{ route('waka_get_data_pembina') }}",
			columns:[	
				{data:'DT_RowIndex', name:'No', orderable:false, width:'1%', className:'text-center'},
				{data:'nama_pembina'},
				{data:'jabatan'},
				{data:'jenis_kelamin', name:'jenis_kelamin'},
				{data:'no_telepon', name:'no_telepon'},
				// {data:'status', name:'status', className:'text-center'},
				{data:'aksi', name:'aksi', orderable:false, className:'text-center'},						
			]});
	});   
</script>
@endsection