@extends('layouts.main')

@section('judul')
Deskripsi Penilaian | E-Smanpul
@endsection  

@section('judul_head') 
Deskripsi Penilaian
@endsection

@section('content')
<table class="table" id="table-ekskul">
	<thead class="text-primary">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nama Ekskul</th>
			<th scope="col">Tempat Latihan</th>
			<th scope="col">Aksi</th>
		</tr>      			
	</thead>
	<tbody>
		@foreach ($deskripsi_nilai as $deskripsi_nilai)
		<tr>
			<td scope="row">{{ $loop->iteration }} </td>
			<td>{{ $deskripsi_nilai-> id_ekskul}} </td>
			<td>{{ $deskripsi_nilai-> deskripsi}} </td>	      	
		</tr>
		@endforeach
	</tbody>
</table>
@endsection