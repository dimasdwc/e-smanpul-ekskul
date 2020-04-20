@extends('layouts.main')

@section('judul')
  Siswa | E-Smanpul
@endsection  

@section('judul_head') 
Data Siswa
@endsection

@section('content')
	<table class="table" id="table-pengguna">
		<thead class="text-primary">
			<tr>
        <th scope="col">#</th>
		  	<th scope="col">Nama</th>
				<th scope="col">Jenis Kelamin</th>
				<th scope="col">Kelas</th>
				<th scope="col">Aksi</th>
			</tr>     
   			
		</thead>
		<tbody>
			@foreach ($siswa as $siswa)
			<tr>
				<td scope="row">{{ $loop->iteration }} </td>
				<td>{{ $siswa-> nama_siswa}} </td>
				<td>{{ $siswa-> jenis_kelamin}} </td>
				<td>{{ $siswa-> kelas}} </td>      				
			</tr>
			@endforeach
		</tbody>
	</table>  	
@endsection