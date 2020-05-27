@extends('layouts.main')

@section('judul')
  Pelatih | E-Smanpul
@endsection  

@section('judul_head') 
Data Pelatih
@endsection

@section('content')
<div class="container">
	<table class="table " id="table-pengguna">
	<thead class="text-primary">
		<tr>
			<th scope="col">#</th>						
			<th scope="col">Foto</th>
			<th scope="col">Nama Pelatih</th>
			<th scope="col">Jabatan</th>
			<th scope="col">Aksi</th>
		</tr>      			
	</thead>
	<tbody>
		@foreach ($users as $user)
		<tr>
			<td scope="row">{{ $loop->iteration }} </td>						      		
			<td>{{ $user-> avatar}} </td>      				
			<td>{{ $user-> nama_user}} </td>      				
			<td>{{ $user-> jabatan}} </td>      				
			<td>				
				<a href="/user/{{$user->id}}/detail" type="button" class="btn btn-secondary btn-sm ">Detail</a>				
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>

@endsection