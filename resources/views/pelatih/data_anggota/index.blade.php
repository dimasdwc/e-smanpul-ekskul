@extends('layouts.main-pelatih')

@section('judul')
  	Data Anggota | E-Smanpul
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
	      			<h4 class="card-title">Tabel Daftar Anggota</h4>
	      			<p class="card-category">				
						Tambahkan anggota baru dengan meng-klik tombol, "Tambah Anggota Baru".
					</p>
	      		</div>
	      		<div class="col-md-3 ml-auto mr-auto text-right">
	      			<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#tambahAnggota">
						Tambah Anggota Baru
					</button>
	      		</div>
      		</div>
      	</div>

      	{{-- <div class="col-lg-12 ml-auto mr-auto text-left "> --}}
    	<div class="card-body"> 
        	<div class="table-responsive-lg">
	        	<table class="table table-hover" id="tabel_anggota">
					<thead>
						<tr>				    	
						  	<th scope="col">No</th>
						  	<th scope="col">Nama Lengkap</th>
							<th scope="col">Jenis Kelamin</th>
							<th scope="col">Kelas</th>						
							<th scope="col">Aksi</th>
						</tr>     						
					</thead>
				</table>        
        	</div>       	
		</div>
	{{-- </div> --}}
   	</div>
</div>

{{-- Modals Tambah anggota baru --}}
<div class="modal fade" id="tambahAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">    	
    		<div class="modal-header">
		      <h5 class="modal-title" id="exampleModalLabel">Pilih Anggota Baru</h5>		      
	      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	         	<span aria-hidden="true">&times;</span>
	       	</button>
      	</div>
	      	<div class="modal-body">
	        <form action="/pelatih/tambah-anggota" method="POST">
	        	{{@csrf_field()}}
			    <div class="form-group">			    	
			        	<table class="table table-hover table-sm" id="tabel_siswa">
							<thead>
								<tr>							    					  
								  	<th scope="col">Nama Lengkap</th>
									<th scope="col">Kelas</th>	
									<th scope="col">Aksi</th>
								</tr>     						
							</thead>
							<tbody>								
							</tbody>
						</table>
					{{-- </div> --}}
			    </div>			    			    		 		    
	    	</form>				
    	</div>
  		</div>
	</div>
</div>
@endsection

@section('customJS')
<script type="text/javascript">
	$("#anggota").addClass('active');

	$(document).ready(function(){
		$('#tabel_anggota').DataTable({		
			processing: true,
			serverSide: true,
			responsive: true,
			searching: true,

			ajax:"{{ route('get_data_anggota') }}",
			columns:[	
				{data:'DT_RowIndex', name:'id', orderable:false, width:'1%', className:'text-center'},
				{data:'nama_lengkap', name:'nama_lengkap'},
				{data:'jenis_kelamin', name:'jenis_kelamin'},		
				{data:'kelas', name:'kelas'},						
				{data:'detail', name:'detail', orderable:false, className:'text-center'},						
			]
		});

		$('#tabel_siswa').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			searching: true,
			lengthChange: false,
			order:[
				[0,'asc']
			],

			ajax:"{{ route('get_data_anggota_baru') }}",
			columns:[			
				{data:'nama_lengkap',name: 'nama_lengkap'},
				{data:'kelas', name:'kelas'},			
				{data:'aksi',name: 'aksi',orderable:false,}
			]
		});
});   
</script>
@endsection