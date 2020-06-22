@extends('layouts.main-waka')

@section('judul')
Daftar Ekskul | E-Smanpul
@endsection  

@section('content')

<div class="container">
	<table class="table" id="table-ekskul">		
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
		  Tambah Ekskul Baru
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Ekskul Baru</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      	<div class="modal-body">
		        <form>				
				    <div class="form-group">
					    <label for="inputNamaEkskul">Nama Ekskul</label>
					    <input type="text" class="form-control" id="inputNamaEkskul" placeholder="Nama Ekskul">
				    </div>				    
				    <div class="form-group">
					    <label for="inputTempatLatihan">Tempat Latihan</label>
					    <input type="text" class="form-control" id="inputTempatLatihan" placeholder="Tempat Latihan">
				    </div>			
				    <div class="form-group">
					    <label for="inputPelatih">Pelatih</label>
					    <input type="text" class="form-control" id="inputPelatih" placeholder="Pilih Pelatih">
				    </div>	
				    <div class="form-group">
					    <label for="inputPelatih">Pembiming</label>
					    <input type="text" class="form-control" id="inputPembimbing" placeholder="Pilih Pelatih">
				    </div>

					<div class="form-row">
					    <div class="form-group col-md-6">
						    <label for="inputCity">City</label>
						    <input type="text" class="form-control" id="inputCity">
					</div>
					    <div class="form-group col-md-4">
					      <label for="inputState">State</label>
					      <select id="inputState" class="form-control">
					        <option selected>Choose...</option>
					        <option>...</option>
					      </select>
					    </div>
					    <div class="form-group col-md-2">
					      <label for="inputZip">Zip</label>
					      <input type="text" class="form-control" id="inputZip">
					    </div>
					  </div>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
		        <button type="button" class="btn btn-primary">Simpan Data Baru</button>
		      </div>
		    </div>
		  </div>
		</div>
	<thead class="text-primary">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nama Ekskul</th>
			<th scope="col">Tempat Latihan</th>
			<th scope="col">Pelatih</th>
			<th scope="col">Pembina</th>
			<th scope="col">Status</th>
			<th scope="col">Aksi</th>
		</tr>      			
	</thead>
	<tbody>
		@foreach ($daftar_ekskul as $daftar_ekskul)
		<tr>
			<td scope="row">{{ $loop->iteration }} </td>
			<td>{{ $daftar_ekskul-> nama_ekskul}} </td>
			<td>{{ $daftar_ekskul-> tempat_latihan}} </td>
			<td>{{ $daftar_ekskul-> id_pelatih}} </td>     
			<td>
				<a href="#" type="button" class="btn btn-info btn-sm">Ubah</a>
				<a href="#" type="button" class="btn btn-danger btn-sm ">Hapus</a>				
			</td> 				
		</tr>
		@endforeach
	</tbody>
</table>
</div>

@endsection