@extends('layouts.main-waka')

@section('judul')
  	Data Siswa | E-Smanpul
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
      		<div class="row">		      		
	      		<div class="col-6">
	      			<h4 class="card-title">Tabel Daftar Siswa</h4>
	      		</div>
	      		<div class="col-6 text-right">
	      			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahSiswa">
					Tambah Siswa Baru
					</button>
	      		</div>
      		</div>	      		
	      	<p class="card-category">				
				Tambahkan siswa baru dengan meng-klik tombol, "Tambah Siswa Baru".
			</p> 
			<hr>        	
      	</div>
		{{-- <div class="card-header">
	        <h4 class="card-title">Tabel Daftar Siswa</h4> 
			<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahSiswa">
				  Tambah Siswa Baru
			</button>	        
        </div> --}}
        <div class="card-body">
        	<div class="table-responsive"> 
	        	<table class="table table-hover table-striped" id="tabel_siswa">
					<thead>
						<tr>			  	
						  	<th scope="col">Nama Lengkap</th>
							<th scope="col">Jenis Kelamin</th>
							<th scope="col">Tempat Lahir</th>
							<th scope="col">Tanggal Lahir</th>
							<th scope="col">Alamat</th>
							<th scope="col">Aksi</th>
						</tr>     						
					</thead>
				</table>
			</div>
		</div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">    	
    		<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Tambah Ekskul Baru</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
        		</button>
      		</div>
	      	<div class="modal-body">
	        <form action="/siswa/tambah" method="POST">
	        	{{@csrf_field()}}
	        	<div class="form-group">
				    <label for="inputNamaEkskul">Nama Lengkap</label>
				    <input name="nama_lengkap" type="text" class="form-control" id="inputNamaSiswa">
			    </div>
			    <div class="form-group">
				    <label for="selectJenisKelamin">Jenis Kelamin</label>
				    <select name="jenis_kelamin" class="form-control" id="selectJenisKelamin">
				      <option value="Laki-Laki">Laki-Laki</option>
				      <option value="Perempuan">Perempuan</option>			      
				    </select>
				  </div>				    
			    <div class="form-group">
				    <label for="inputTempatLahir">Tempat Lahir</label>
				    <input name="tempat_lahir" type="text" class="form-control" id="inputTempatLahir">
			    </div>
			    <div class="form-group">
				    <label for="inputTanggalLahir">Tanggal Lahir</label>
				    <input name="tanggal_lahir" type="date" class="form-control" id="inputTanggalLahir">
			    </div>					   
			    <div class="form-group">
				    <label for="textareaAlamat">Alamat</label>
				    <textarea name="alamat" class="form-control" id="textareaAlamat" rows="3"></textarea>
			    </div>			  
		    <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
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
$("#siswa").addClass('active');
$(document).ready(function(){
	$('#tabel_siswa').DataTable({
		dom: 'Bfrtip',
            buttons: ['excel', 'pdf', 'print'],

		processing: true,
		serverSide: true,
		responsive: true,
		searching: true,

		ajax:"{{ route('get_data_siswa') }}",
		columns:[			
			{data:'nama_lengkap',name: 'nama_lengkap'},
			{data:'jenis_kelamin',name: 'jenis_kelamin'},
			{data:'tempat_lahir',name: 'tempat_lahir'},
			{data:'tanggal_lahir',name: 'tanggal_lahir'},
			{data:'alamat',name: 'alamat'},
			{data:'aksi',name: 'aksi'}
		]
	});
});    
</script>
@endsection