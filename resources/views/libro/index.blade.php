@extends('layouts.app')
@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-succes alert-dismissible" role="alert">
        
        {{ Session::get('mensaje') }}
        <button type="button"  class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    @endif
        

    <a href="{{ url('libro/create') }}" class="btn btn-success">Registrar Nuevo Libro</a>
    <br><br>
    <form class="form-search content-search navbar-form" action="{{route('libro.index')}}" method="GET">
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

    <div class="container">
        
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
                    <a href="{{ route('libro.show', $libro->id)}}" class="card-link">Ver Más</a>
                    <a href="{{ url('/libro/'.$libro->id.'/edit') }}" class="card-link">Editar</a>
                    <form action="{{ url('/libro/'.$libro->id) }}" class="d-inline" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="card-link" type="submit" onclick="return confirm('¿Quiere elimar libro?')" value="Borrar">
                    </form>

                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>

</div>
@endsection