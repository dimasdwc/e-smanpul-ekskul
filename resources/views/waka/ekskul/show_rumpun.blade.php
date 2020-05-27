@extends('layouts.main')

@section('judul')
Daftar Rumpun | E-Smanpul
@endsection  

@section('judul_head') 
Daftar Rumpun Ekskul
@endsection

@section('content')
<div class="col-md-6">
  <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
    <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Seni
        </button>
      </h5>
    </div> 
    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action border-0">Musik</a>
            <a href="#" class="list-group-item list-group-item-action border-0">Tari</a>
            <a href="#" class="list-group-item list-group-item-action border-0">Teater</a>              
        </div>
      </div>
    </div>     
  </div>  
  
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Bela Diri
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
          <a href="#" class="list-group-item list-group-item-action border-0">Karate</a>
          <a href="#" class="list-group-item list-group-item-action border-0">Pencak Silat</a>
          <a href="#" class="list-group-item list-group-item-action border-0">Taekwondo</a>
      </div>    
    </div> 
  </div>
  <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Olahraga Permainan
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
          <a href="#" class="list-group-item list-group-item-action border-0">Bola Volly</a>
          <a href="#" class="list-group-item list-group-item-action border-0">Bola Basket</a>
          <a href="#" class="list-group-item list-group-item-action border-0">Futsal</a>
          <a href="#" class="list-group-item list-group-item-action border-0">Sepak Takraw</a>
          <a href="#" class="list-group-item list-group-item-action border-0">Bola Tangan</a>
        </div>
      </div>
  </div>
  <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <a href="/ekskul"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEmpat" aria-expanded="false" aria-controls="collapseThree">
            Pramuka
          </button></a>
        </h5>
      </div>      
  </div>

  <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseLima" aria-expanded="false" aria-controls="collapseThree">
            Drumband
          </button>
        </h5>
      </div>      
  </div>

  <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEnam" aria-expanded="false" aria-controls="collapseThree">
            Sispala
          </button>
        </h5>
      </div>      
  </div>

  <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <a href="/ekskul"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEmpat" aria-expanded="false" aria-controls="collapseThree">
            Paskibra
          </button></a>
        </h5>
      </div>      
  </div>

  <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <a href="/ekskul"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEmpat" aria-expanded="false" aria-controls="collapseThree">
            Rohis
          </button></a>
        </h5>
      </div>      
  </div>

  <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <a href="/ekskul"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEmpat" aria-expanded="false" aria-controls="collapseThree">
            Jurnalistik
          </button></a>
        </h5>
      </div>      
  </div>

</div>
</div>
@endsection