@extends('layouts.main')

@section('judul')
  Pengguna | E-Smanpul
@endsection  

@section('judul_head') 
Data Pengguna
@endsection

@section('content')
<div class="container">
	<table class="table " id="table-pengguna">
	<thead class="text-primary">
		<tr>
			<th scope="col">#</th>
			{{-- <th scope="col">Nama</th>
			<th scope="col">Jabatan</th> --}}
			<th scope="col">Role</th>
			<th scope="col">Username</th>
			<th scope="col">Password</th>
			<th scope="col">Aksi</th>
		</tr>      			
	</thead>
	<tbody>
		@foreach ($pengguna as $pengguna)
		<tr>
			<td scope="row">{{ $loop->iteration }} </td>
			{{-- <td>{{ $pengguna-> nama}} </td>
			<td>{{ $pengguna-> jabatan}} </td> --}}
			<td>{{ $pengguna-> role}} </td>      				
			<td>{{ $pengguna-> username}} </td>      				
			<td>{{ $pengguna-> password}} </td>      				
		</tr>
		@endforeach
	</tbody>
</table>
</div>

@endsection