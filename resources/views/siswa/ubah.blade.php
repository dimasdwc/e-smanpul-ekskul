@extends('layouts.main')

@section('judul')
Data Siswa | E-Smanpul
@endsection  

@section('content')	

<div class="container">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Ubah Data Siswa</h4> 
		</div>			
		<div class="card-body">
			<form action="/siswa/{{$siswa->id}}/update" method="POST">
	        	{{@csrf_field()}}
	        	<div class="form-group">
				    <label for="inputNamaEkskul">Nama Lengkap</label>
				    <input name="nama_lengkap" value="{{$siswa->nama_lengkap}}" type="text" class="form-control" id="inputNamaSiswa">
			    </div>
			    <div class="form-group">
				    <label for="selectJenisKelamin">Jenis Kelamin</label>
				    <select name="jenis_kelamin" class="form-control" id="selectJenisKelamin">
				      <option value="Laki-Laki" @if ($siswa->jenis_kelamin =='Laki-Laki') selected @endif>Laki-Laki</option>
				      <option value="Perempuan" @if ($siswa->jenis_kelamin =='Perempuan') selected @endif>Perempuan</option>			      
				    </select>
				</div>				    
			    <div class="form-group">
				    <label for="inputTempatLahir">Tempat Lahir</label>
				    <input name="tempat_lahir" value="{{$siswa->tempat_lahir}}" type="text" class="form-control" id="inputTempatLahir">
			    </div>
			    <div class="form-group">
				    <label for="inputTanggalLahir">Tanggal Lahir</label>
				    <input name="tanggal_lahir" value="{{$siswa->tanggal_lahir}}" type="date" class="form-control" id="inputTanggalLahir">
			    </div>					   
			    <div class="form-group">
				    <label for="textareaAlamat">Alamat</label>
				    <textarea name="alamat" class="form-control" id="textareaAlamat" rows="3">{{$siswa->alamat}}</textarea>
			    </div>
			    <div class="card-footer text-right">
			    	<a href="/siswa" class="btn btn-secondary">Kembali</a>			    	
		        	<button type="submit" class="btn btn-success">Simpan Perubahan</button>	
			    </div>	
			    
	    		    		       	     
	        </form>	
     	</div>	
	</div>
</div>
@endsection

