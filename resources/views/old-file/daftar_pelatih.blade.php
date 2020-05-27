@extends('layouts.main')

@section('judul')
  Pelatih | E-Smanpul
@endsection  

@section('judul_head') 
Data Pelatih
@endsection

@section('content')
<div class="container">
	<table class="table " id="table-pelatih">
	<thead class="text-primary">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nama Lengkap</th>
			<th scope="col">Jabatan</th>
			<th scope="col">Aksi</th>
		</tr>      			
	</thead>
	<tbody>

		@foreach ($pelatih as $pelatih)
		<tr>
			<td scope="row">{{ $loop->iteration }} </td>		  		
			<td>{{ $pelatih-> nama_user}} </td>      				
			<td>{{ $pelatih-> jabatan}} </td>      				
			<td>				
				<a href="/pelatih/{{$pelatih->id}}/detail" type="button" class="btn btn-secondary btn-sm ">Detail</a>		
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>

@endsection