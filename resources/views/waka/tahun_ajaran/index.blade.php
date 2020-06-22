@extends('layouts.main-waka')

@section('judul')
  Tahun Ajaran | E-Smanpul
@endsection  

@section('judul_head') 
<span> {{$tahun_ajaran->tahun_ajaran}} </span>
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
	      			<h5 class="card-title">Tabel Tahun Ajaran</h5>
	      			<p class="card-category">				
						Tambahkan tahun ajaran baru dengan meng-klik tombol, "Tambah Tahun Ajaran Baru"
					</p>
	      		</div>
	      		<div class="col-md-3 ml-auto mr-auto text-right">
	      			<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">
			  			Tambah Tahun Ajaran Baru
					</button>
	      		</div>
      		</div>
		</div>
		<div class="card-body">
			<div class="table-responsive-lg">
				<table class="table table-hover" id="table-tahun-ajaran">				
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Tahun Ajaran</th>
							<th scope="col">Semester</th>
							<th scope="col">Status</th>
							<th scope="col">Aksi</th>
						</tr>      			
					</thead>
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
	       	<h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Ajaran Baru</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	         	<span aria-hidden="true">&times;</span>
     			</button>
   		</div>
      <form action="/waka/tahun-ajaran/tambah" method="POST">	
      {{ csrf_field()}}			
     		<div class="modal-body">
			   	<div class="form-group">
				   	<label for="inputTahunAjaran">Tahun Ajaran</label>
				   	<div class="row">
					   	<div class="col-5">
					   		<input type="text" name="inputTahunAjaran1" class="form-control" id="inputTahunAjaran1">
					   	</div>
					   	<div class="col-2">
					   		<h3 class="text-center">/</h3>
					   	</div>
					   	<div class="col-5">
					   		<input type="text" name="inputTahunAjaran2" class="form-control" id="inputTahunAjaran2">
					   	</div>
				   	</div>
		    	</div>
		    	<div class="form-group">
				   	<label for="inputTahunAjaran">Semester</label>
				   <select class="form-control" style="width: 100%" name="selectRumpun" id="selectRumpun">
		        		<option hidden>-- Pilih semester --</option>			  	
					  	<option value="Ganjil">Ganjil</option>
					  	<option value="Genap">Genap</option>
					</select>
		    	</div>
			</div>		
      	<div class="modal-footer">
        		<button type="button" class="btn btn-primary btn-neutral" data-dismiss="modal">Kembali</button>
        		<button type="submit" class="btn btn-primary">Simpan Data Baru</button>
      	</div>
		</form>
      </div>
   </div>
</div>

@endsection

@section('customJS')
<script type="text/javascript">
	$("#tahun-ajaran").addClass('active'); 

	$(document).ready(function(){
		$('#table-tahun-ajaran').DataTable({		
			processing: true,
			serverSide: true,
			responsive: true,
			searching: true,

			language:{
				url : "{{ asset('indonesia.json') }}",
			},

			ajax:"{{ route('waka_get_data_tahun_ajaran') }}",
			columns:[	
				{data:'DT_RowIndex', orderable:false, width:'1%', className:'text-center'},
				{data:'tahun_ajaran'},
				{data:'semester'},
				{data:'status', name:'status'},
				{data:'aksi', name:'aksi', orderable:false, className:'text-center'},						
			]});
	});   
</script>
@endsection