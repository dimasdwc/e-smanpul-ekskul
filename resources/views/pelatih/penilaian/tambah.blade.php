@extends('layouts.main-pelatih')

@section('judul')
  	Data Anggota | E-Smanpul
@endsection  

@section('content')		

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Tambah Penilaian Anggota</h5> 
			<p class="card-category">
				Tambahkan penilaian anggota dengan mengisi form yang tersedia lalu klik "Simpan"
			</p>
			<hr>
		</div>
		<div class="card-body">
			<form action="/pelatih/tambah-penilaian" method="POST">
	        	{{@csrf_field()}}
	        	<div class="row">
	        		<div class="col-12">
	        			<h6>Data Anggota</h6>
	        		</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-sm-2">
	        			<input type="hidden" name="siswa_id" value="{{ $data_anggota->siswa_ekskul->id }}">
	        		</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputNamaEkskul">NISN</label>
					   	<input name="nisn" value="{{ $data_anggota->siswa_ekskul->nisn }}" type="text" class="form-control" disabled>
						</div>
				   </div>
				   <div class="col-sm-4">
						<div class="form-group">
							<label for="inputNamaEkskul">NIS</label>
					   	<input name="nis" value="{{ $data_anggota->siswa_ekskul->nis }}" type="text" class="form-control" disabled>
						</div>
				   	</div>	
			   	</div>
	        	<div class="row">
	        		<div class="col-2">
	        		</div>
					<div class="col-sm-8">
						<div class="form-group">
							<label for="inputNamaEkskul">Nama Lengkap</label>
					   	<input name="nama_lengkap" value="{{ $data_anggota->siswa_ekskul->nama_lengkap }}" type="text" class="form-control" disabled>
						</div>
				   </div>	
			   </div>

			   	<div class="row">
			   	<div class="col-2"></div>		        	
					<div class="col-sm-8">
						<div class="form-group">
							<label for="inputNamaEkskul">Kelas</label>
					   	<input name="kelas" value="{{ $kelas_siswa }}" type="text" class="form-control" disabled>
						</div>
				   	</div>	
			   	</div>
			   	<hr>	

			   	<div class="row">
	        		<div class="col-12">
	        			<h6>Data Ekstrakurikuler</h6>
	        		</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-2">
	        		</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputNamaEkskul">Nomor Ekskul</label>
					   	<input name="no_ekskul" value="{{ $data_ekskul->ekskul->no_ekskul }}" type="text" class="form-control" disabled>
						</div>
				   	</div>				  
			   	</div>
	        	<div class="row">
	        		<div class="col-2">
	        		</div>
					<div class="col-sm-8">
						<div class="form-group">
							<label for="inputNamaEkskul">Nama Ekskul</label>
					   	<input name="nama_ekskul" value="{{ $data_ekskul->ekskul->nama_ekskul }}" type="text" class="form-control" disabled>
						</div>
				   	</div>	
			   	</div>

			   	<div class="row">
			   	<div class="col-2"></div>		        	
					<div class="col-sm-8">
						<div class="form-group">
							<label for="inputNamaEkskul">Nama Pelatih</label>
					   	<input name="nama_pelatih" value="{{ $data_pelatih->name }}" type="text" class="form-control" disabled>
						</div>
				   </div>	
			   	</div>
			   	<hr>
			   
			   	<div class="row">
	        		<div class="col-12">
	        			<h6>Isi Penilaian Anggota</h6>
	        		</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-2"></div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputTahunAjaran">Tahun Ajaran</label>
					   	<input name="tahun_ajaran" value="{{ $tahun_ajaran->tahun_ajaran }}" type="text" class="form-control" disabled id="inputTahunAjaran">
						</div>
				   	</div>
				   	<div class="col-sm-4">
						<div class="form-group">
							<label for="inputSemester">Semester</label>
					   	<input name="semester" value="{{ $tahun_ajaran->semester }}" type="text" class="form-control" disabled id="inputSemester">
						</div>
				   	</div>				  
			   	</div>
	        	<div class="row">
	        		<div class="col-2"></div>
					<div class="col-sm-8">
						<div class="form-group">
							<label for="select2Deskripsi">Pilih Deskripsi</label>
						   	<select class="js-example-basic-multiple" style="width: 100%" name="data_deskripsi" multiple="multiple" id="select2Deskripsi" onchange="changeFunc();">
								  	@foreach ($data_deskripsi as $deskripsi)
								  		<option value="{{$deskripsi->isi_deskripsi}}"> {{$deskripsi->isi_deskripsi}} </option>
								  	@endforeach
							</select>
						</div>
				   </div>	
			   	</div>
			   	<div class="row">
			   	<div class="col-2"></div>		        	
					<div class="col-sm-8">
					   <div class="form-group">
						    <label for="textareaAlamat">Deskripsi Penilaian</label>
						    <textarea name="deskripsi_penilaian" class="form-control" id="textareaDeskripsi" rows="3"></textarea>
					    </div>
					</div>
			  	</div>

				<div class="form-group">
			   		<div class="row">
	        			<div class="col-md-2"></div>
						<div class="col-md-2">
							<label for="selectPredikat">Predikat</label>
						   	<select name="predikat" class="js-example-placeholder-single form-control" style="width: 100%" id="selectPredikat" onchange="changePredikat();">
						     	@foreach ($data_predikat as $predikat)
						  			<option value=""></option>
						  			<option value="{{$predikat->id}}"> {{$predikat->predikat}}</option>
						  		@endforeach			      
						   	</select>
						</div>
				 
						<div class="col-md-2">
							<label for="inputKeterangan">Keterangan</label>
						   	<input name="keterangan" value="" type="text" class="form-control" disabled id="inputKeterangan">
						</div>
				   </div>				  
			  	</div>
			   	<hr>
			    <div class="card-footer text-right" style="padding:1px">
			    	<a href="/pelatih/penilaian" class="btn btn-secondary">Kembali</a>			    	
		        	<button type="submit" class="btn btn-success">Simpan Data</button>	
			    </div>		       	     
	        </form>	
     	</div>
	</div>
</div>

@endsection

@section('customJS')
<script type="text/javascript">
	$("#penilaian").addClass('active');
	$(document).ready(function() {
	   	$("#select2Deskripsi").select2({
	   		placeholder: 'Pilih deskripsi sebagai penilaian disini !', 
	   		//theme: "classic", 			
	   	});

	   	$("#selectPredikat").select2({
	   		placeholder: '--Pilih--',
	   		allowClear: true
	   	});
	});

	function changeFunc() {	  
	   var select_button_text = $('#select2Deskripsi option:selected').toArray().map(item =>' '+item.text).join();
	   $('#textareaDeskripsi').val(select_button_text);

	    // var pilihDeskripsi = selectedValue.forEach();
	    // alert(select_button_text);
	    // var currDeskripsi[] = selectedValue[];
	    // $('#textareaDeskripsi').val(selectedValue[] + ', ' + currDeskripsi);
  	}

   	function changePredikat() {
	   var selectBox = document.getElementById("selectPredikat");
	   var selectedValue = selectBox.options[selectBox.selectedIndex].value;	  	     	   
	   if (selectedValue == 1) {
	   	$('#inputKeterangan').val("Sangat Baik");
	   } else if (selectedValue == 2) {
	   	$('#inputKeterangan').val("Baik");
	   } else if (selectedValue == 3) {
	   	$('#inputKeterangan').val("Cukup");
	   } else if (selectedValue == 4) {
	   	$('#inputKeterangan').val("Kurang");
	   }
	   // $('#inputKeterangan').val(selectedValue);
	}
</script>
@endsection