@extends('layouts.main-pelatih')

@section('judul')
Deskripsi Penilaian | E-Smanpul
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
                <div class="col-lg-9 ml-auto mr-auto text-left ">
	      			<h5 class="card-title">Tabel Deskripsi Penilaian</h5>
	      			<p class="card-category">				
						Tambahkan deskripsi penilaian baru dengan meng-klik tombol, "Tambah Deskripsi Baru"
					</p>
	      		</div>
	      		<div class="col-md-3 ml-auto mr-auto text-right">
	      			<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">
			  			Tambah Deskripsi Baru
					</button>
	      		</div>
      		</div>
		</div>
		<div class="card-body">
			<div class="table-responsive-lg">
				<table class="table table-hover" id="table-ekskul">				
					<thead class="text-primary">
						<tr>
							<th scope="col">No</th>
							<th scope="col">Isi Deskripsi Penilaian</th>
							<th scope="col">Aksi</th>
						</tr>      			
					</thead>
					<tbody>
						@forelse ($data_deskripsi as $deskripsi)
							<tr>
								<td scope="row">{{ $loop->iteration }} </td>
								<td>{{ $deskripsi-> isi_deskripsi}} </td>    
								<td>			
									<a href="/pelatih/{{$deskripsi->id}}/hapus-deskripsi" type="button" class="btn btn-danger btn-sm ">Hapus</a>				
								</td> 				
							</tr>
						@empty 
						   <tr>
						    	<td colspan="4"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
						   </tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
   		<div class="modal-header">
	       	<h5 class="modal-title" id="exampleModalLabel">Tambah Deskripsi Penilaian</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	         	<span aria-hidden="true">&times;</span>
     			</button>
   		</div>
      <form action="/pelatih/deskripsi" method="POST">	
      {{ csrf_field()}}			
     		<div class="modal-body">
		   	<div class="form-group">
			   	<label for="textareaAlamat">Isi Deskripsi Penilaian</label>
			   	<textarea name="deskripsi_penilaian" class="form-control" id="textareaDeskripsi" rows="3"></textarea>
		    	</div>
			</div>		
      	<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        		<button type="submit" class="btn btn-primary">Simpan Data Baru</button>
      	</div>
		</form>
      </div>
   </div>
</div>

@endsection

@section('customJS')
<script type="text/javascript">
	$("#deskripsi_nilai").addClass('active');
</script>
@endsection