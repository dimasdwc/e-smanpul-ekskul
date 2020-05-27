@extends('layouts.main-waka')

@section('judul')
  Data Penilaian Siswa | E-Smanpul
@endsection  

@section('content')  
<div class="col-md-12">
	<div class="card text-white bg-info mb-3" style="max-width: 100%;"> 
	  	<div class="card-body">

	  	</div>
	</div>
</div>
@endsection

@section('customJS')
<script type="text/javascript">
	$("#nilai_siswa").addClass('active');  
</script>
@endsection