@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card-deck">
    <div class="card col-12 col-md-4">
      <img class="card-img" src="{{ asset('storage').'/'.$libro->Portada }}" height="500" width="10px" alt="Card image">
    </div>
    
    <div class="card" style="width: 18rem;">
      <div class="card-body col-12 col-md-8">
        <h1>{{ $libro->Titulo }}</h1>
        <h6 class="card-subtitle mb-2 text-muted">{{ $libro->Autor }}</h6>
        <p class="card-text"><b>Descripcion:</b> <br> {{ $libro->Descripcion }}</p>
        <p class="card-text">{{ $libro->DescripcionLarga }}</p>
        <p class="card-text"><b>ISBN:</b> {{ $libro->ISBN }}</p>
        <p class="card-text"><b>Editorial:</b> {{ $libro->Editorial }}</p>
        <p class="card-text"><b>Numero de Paginas:</b> {{ $libro->NumeroPaginas }}</p>
        <p class="card-text"><b>Edicion:</b> {{ $libro->Edicion }}</p>
        <p class="card-text"><b>Pais:</b> {{ $libro->Pais }}</p>
        <p class="card-text"><b>Año de publicacion:</b> {{ $libro->Año }}</p>
        <hr>
        <a class="btn btn-primary" href="{{ url('/') }}">Regresar</a>
      </div>
    </div>
  </div>
</div>

@endsection