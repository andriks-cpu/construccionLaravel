@extends('layouts.app')
@section('content')

<div class="container">
    <div class="container">
        
        <!--Busquedas-->
        <form class="form-search content-search navbar-form" action="{{route('inicio')}}" method="GET">
            <div class="input-group"> 
        <input placeholder="Buscar" class="form-control form-text" type="text" name="search" id="search" value="{{request()->query('search')}}" /> 
                <span class="input-group-btn">
                &nbsp;  &nbsp;&nbsp;  &nbsp; <button type="submit" class="btn btn-primary"><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span>Buscar</button>
                </span>
            </div>
        </form>
        <br><hr>

        <!--PDF-->
        <div>

            <a class="btn btn-primary" href="{{ url('/descargaPDF') }}">Descargar PDF</a>

        </div>
       <br>


        <div class="row">
            @foreach( $libros as $libro)
            <div class="col-6 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('storage').'/'.$libro->Portada }}" height="300" width="30" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{ $libro->Titulo }}</h5>
                    <p class="card-text"> {{$libro->Descripcion}} </p>
                    </div>
                    <div class="card-body">
                    <a href="{{ route('book', $libro->id)}}" class="card-link">Ver Más</a>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>


</div>

@endsection