@extends('layouts.main')

@section('judul')
Daftar Ekskul | E-Smanpul
@endsection  

@section('judul_head') 
Daftar Ekskul Aktif
@endsection

@section('content')
<table class="table" id="table-ekskul">
	<thead class="text-primary">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nama Ekskul</th>
			<th scope="col">Tempat Latihan</th>
			<th scope="col">Pelatih</th>
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
		</tr>
		@endforeach
	</tbody>
</table>
@endsection