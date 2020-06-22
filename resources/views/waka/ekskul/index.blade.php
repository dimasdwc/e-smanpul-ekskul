@extends('layouts.main-waka')

@section('judul')
Daftar Ekskul | E-Smanpul
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

		<div class="row">
			<div class="col-md-5">
				<div class="card-header">	      			         
	      			<h4 class="card-title">Daftar Ekstrakurikuler</h4>	      			
				</div>
			</div>
			<div class="col-md-7">
				<ul class="nav nav-tabs" role="tablist">
				    <li class="nav-item">
				      <a class="nav-link active" data-toggle="tab" href="#home">Rumpun</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" data-toggle="tab" href="#menu2">Semua Ekskul</a>
				    </li>
		  		</ul>
			</div>
		</div>

  		<!-- Tab panes -->
		<div class="tab-content">
		    <div id="home" class="container tab-pane active"><br>
				<div class="card-body">
					<div class="table-responsive-lg"> 
						<table class="table table-hover" id="tabel_daftar_ekskul_rumpun">
							<thead>
								<tr>				    						 
									<th scope="col">No</th>
									<th scope="col">Nama Rumpun</th>
									<th scope="col">Aksi</th>
								</tr>     						
							</thead>
						</table>  			
					</div>
				</div>
		    </div>

		   {{--  <div id="menu1" class="container tab-pane fade"><br>
			    <h3>Menu 1</h3>
			    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		    </div> --}}

		    <div id="menu2" class="container tab-pane fade"><br>
				<div class="card-body">
					<div class="row">
		                <div class="col-lg-9">
			      		</div>
			      		<div class="col-md-3 ml-auto mr-auto text-right">
			      			<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#daftarEkskul">
					  			Tambah Ekskul Baru
							</button>
			      		</div>
		      		</div>
		      		<div class="row">
		      			<div class="col-md-12">
							<div class="table-responsive-lg"> 
								<table class="table table-hover" style="width: 100%" id="tabel_daftar_ekskul">
									<thead>
										<tr>				    						 
											<th scope="col">No</th>
											<th scope="col">Nama Ekskul</th>
											<th scope="col">Pembina</th>
											<th scope="col">Tempat Latihan</th>
											<th scope="col">Status</th>						
											<th scope="col">Aksi</th>
										</tr>     						
									</thead>
								</table>  			
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="daftarEkskul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Tambah Ekskul Baru</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
        		</button>
      		</div>
	      	<div class="modal-body">
		        <form action="/waka/tambah-ekskul" method="POST">
		        	@csrf
	        		<div class="form-group">
	        			<div class="row mx-0">
			        		<div class="col-sm-3 mt-3">				        	
			        			<label for="inputNoEkskul">No Ekskul</label>
							    <input type="text" name="inputNoEkskul" value="E0{{$no_ekskul}}" class="form-control" readonly="readonly" id="inputNoEkskul" placeholder="">
			        		</div>
			        		<div class="col-sm-9 mt-3">
			        			<label for="inputNamaEkskul">Nama Ekskul  <span style="color: red">*</span> </label>
							    <input type="text" name="inputNamaEkskul" class="form-control" id="inputNamaEkskul" placeholder="Masukan nama ekstrakurikuler">
			        		</div>
			        	</div>
		        	</div>

		        	<div class="form-group">
		        		<div class="col-md-12 mt-3">
		        			<label for="selectRmpun">Rumpun Ekskul <span style="color: red">*</span></label>
				        	<select class="form-control" style="width: 100%" name="selectRumpun" id="selectRumpun">
				        		<option hidden>-- Pilih rumpun --</option>			  	
							  	@foreach ($data_rumpun as $rumpun)
							  		<option value="{{$rumpun->id}}"> {{$rumpun->nama_rumpun}} </option>
							  	@endforeach
							</select>
		        		</div>
		        	</div>

		        	<div class="form-group">
		        		<div class="col-md-12 mt-3">
		        			<label for="inputTempatLatihan">Tempat Latihan</label>
						    <input type="text" name="inputTempatLatihan" class="form-control" id="inputTempatLatihan" placeholder="Masukan tempat latihan">
		        		</div>
	        		</div>
	
				    {{-- <div class="form-group">
		        		<div class="col-md-12 my-3">
		        			<label for="selectPelatih">Pelatih <span style="color: red">*</span></label>
				        	<select class="form-control" style="width: 100%" name="selectPelatih" id="selectPelatih">
							  	<option hidden> Pilih pelatih </option>
							  	@foreach ($data_pelatih as $pelatih)
							  		<option value="{{$pelatih->id}}"> {{$pelatih->name}} </option>
							  	@endforeach
							</select>
		        		</div>
		        	</div> --}}
				    
				    <div class="form-group">
		        		<div class="col-md-12 my-3 ">
		        			<label for="selectPembina">Pembina <span style="color: red">*</span></label>
				        	<select class="form-control" style="width: 100%" name="selectPembina" id="selectPembina">
							  	<option hidden>-- Pilih pembina --</option>
							  	@foreach ($data_pembina as $pembina)
							  		<option value="{{$pembina->id}}"> {{$pembina->nama_pembina}} </option>
							  	@endforeach
							</select>
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
	$("#daftar_ekskul").addClass('active');

	$(document).ready(function(){
	   	// $("#select2Rumpun").select2({
	   	// 	placeholder: 'Pilih rumpun ekskul disini !', 
	   	// 	allowClear: true			
	   	// });
	   	$(function () {
		  	$('[data-toggle="tooltip"]').tooltip()
		})
		$('#tabel_daftar_ekskul').DataTable({		
			processing: true,
			serverSide: true,
			responsive: true,
			searching: true,

			language:{
				url : "{{ asset('indonesia.json') }}",
			},

			ajax:"{{ route('waka_get_data_ekskul') }}",
			columns:[	
				{data:'no_ekskul', name:'no_ekskul', orderable:false, width:'1%', className:'text-center'},
				{data:'nama_ekskul', name:'nama_ekskul'},
				// {data:'rumpun', name:'rumpun'},
				{data:'nama_pembina', name:'nama_pembina'},
				{data:'tempat_latihan', name:'tempat_latihan'},
				{data:'status', name:'status', className:'text-center'},
				{data:'aksi', name:'aksi', orderable:false, className:'text-center'},						
			]});

		$('#tabel_daftar_ekskul_rumpun').DataTable({		
			processing: true,
			serverSide: true,
			responsive: true,
			searching: true,

			ajax:"{{ route('waka_get_data_ekskul_rumpun') }}",
			columns:[	
				{data:'DT_RowIndex', name:'DT_RowIndex', orderable:false, width:'1%', className:'text-center'},
				{data:'nama_rumpun', name:'nama_rumpun'},
				{data:'aksi', name:'aksi', orderable:false, className:'text-center'},						
			]});
	});   
</script>
@endsection