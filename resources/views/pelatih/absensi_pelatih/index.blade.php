@extends('layouts.main-pelatih')

@section('judul')
  	Absensi Pelatih | E-Smanpul
@endsection  

@section('content')

<div class="col-md-12">
	<div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
	   <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
	   	<i class="nc-icon nc-simple-remove"></i>
	   </button>
	   <span data-notify="icon" class="nc-icon nc-bell-55"></span>
	   <span data-notify="message">{{$info['status']}}</span>
	</div>
</div>

<!-- #Mulai-Card input absensi -->
<div class="col-md-12">
	<div class="card">	
		<div class="card-body">                
          	<div class="row">
            	<div class="col-md-6 ml-auto mr-auto text-center">
              		<h4 class="card-title">
                		Absensi Pelatih
              		</h4>
                		<p class="card-category">Klik Tombol Absensi disini dan berikan catatan bila diperlukan</p>
            	</div>
          	</div>
        	<form action="/pelatih/absensi" method="POST">
			{{ csrf_field() }}	
                <div class="row">
                    <div class="col-lg-8 ml-auto mr-auto ">
	                    <div class="row">
	                        <div class="col-md-6">
	                          <button type="submit" name="btnAbsenMasuk" value="btnAbsenMasuk" class="btn btn-primary btn-block" {{$info['btnAbsenMasuk']}}>Absen Masuk</button>
	                        </div>
	                        <div class="col-md-6">
	                          <button type="submit" name="btnAbsenKeluar" value="btnAbsenKeluar" class="btn btn-primary btn-block" {{$info['btnAbsenKeluar']}} >Absen Keluar</button>
	                        </div>
			            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 ml-auto mr-auto mt-2">
                      	<div class="row">
	                        <div class="col-md-12">
	                        	<div class="form-group">
	                          		<textarea name="catatan_absensi" class="form-control" placeholder="Catatan..." id="textareaAlamat" rows="3" {{$info['catatan_absensi']}}></textarea>	
	                          	</div>
	                        </div>
                      	</div>
                    </div>
                </div>
			</form>
        </div>
    </div>		
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
	        <h5 class="card-title">Tabel Riwayat Absensi</h5>
	        <p class="card-category">Disini anda bisa melihat semua daftar absensi yang telah dilakukan sebelumnya</p>
	        <hr>
      	</div>
    	<div class="card-body">        
    		<div class="table-responsive-lg"> 
	        	<table class="table table-hover" id="tabel_absensi_pelatih">		
					<thead>
						<tr>				    						 
							<th scope="col">No</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Jam Masuk</th>
							<th scope="col">Jam Keluar</th>
							<th scope="col">Catatan</th>						
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
	$("#absensi_pelatih").addClass('active ');
	$(document).ready(function(){
		$('#tabel_absensi_pelatih').DataTable({

			processing: true,
			serverSide: true,
			responsive: true,
			searching: true,
			order:[
				[1,'desc']
			],

			ajax:"{{ route('getAbsenPelatih') }}",
			columns:[			
				{data:'DT_RowIndex', name:'id', orderable:false, width:'1%', className:'text-center'},	
				{data:'tanggal',name: 'tanggal'},
				{data:'jam_masuk',name: 'jam_masuk', orderable:false,},			
				{data:'jam_keluar',name: 'jam_keluar', orderable:false,},			
				{data:'catatan',name: 'catatan', orderable:false,},			
			]
		});
	});    
</script>
@endsection