
<h1>{{ $modo }} libro</h1>

@if(count($errors)>0)

    <div class="alert alert-primary" role="alert">
        <ul>
            
            @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
<label for="Titulo">Titulo</label>
    <input type="text" class="form-control" name="Titulo" value="{{ isset($libro->Titulo)?$libro->Titulo:old('Titulo') }}" id="Titulo">
</div>

<div class="form-group">
    <label for="Autor">Autor</label>
    <input type="text" class="form-control" name="Autor" value="{{ isset($libro->Autor)?$libro->Autor:old('Autor') }}" id="Autor">
</div>

<div class="form-group">
    <label for="Descripcion">Descripcion</label>
    <input type="text" class="form-control" name="Descripcion" value="{{ isset($libro->Descripcion)?$libro->Descripcion:old('Descripcion') }}" id="Descripcion">
 </div>
    

<div class="form-group">
    <label for="Portada"></label>
    @if(isset($libro->Portada))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$libro->Portada }}" alt="">
    @endif
    <input type="file" class="form-control" name="Portada" value="" id="Portada">
</div>

<div class="form-group">
    <label for="DescripcionLarga">Descripcion Larga</label>
    <input type="text" class="form-control" name="DescripcionLarga" value="{{ isset($libro->DescripcionLarga)?$libro->DescripcionLarga:old('DescripcionLarga') }}" id="DescripcionLarga">
</div>

<div class="form-group">
    <label for="ISBN">ISBN</label>
    <input type="text" class="form-control" name="ISBN" value="{{ isset($libro->ISBN)?$libro->ISBN:old('ISBN') }}" id="ISBN">
</div>

<div class="form-group">
    <label for="Editorial">Editorial</label>
    <input type="text" class="form-control" name="Editorial" value="{{ isset($libro->Editorial)?$libro->Editorial:old('Editorial') }}" id="Editorial">
</div>

<div class="form-group">
    <label for="NumeroPaginas">Numero de Paginas</label>
    <input type="text" class="form-control" name="NumeroPaginas" value="{{ isset($libro->NumeroPaginas)?$libro->NumeroPaginas:old('NumeroPaginas') }}" id="NumeroPaginas">
</div>

<div class="form-group">
    <label for="Edicion">Edicion</label>
    <input type="text" class="form-control" name="Edicion" value="{{ isset($libro->Edicion)?$libro->Edicion:old('Edicion') }}" id="Edicion">
</div>

<div class="form-group">
    <label for="Pais">Pais</label>
    <input type="text" class="form-control" name="Pais" value="{{ isset($libro->Pais)?$libro->Pais:old('Pais') }}" id="Pais">
</div>

<div class="form-group">
    <label for="Año">Año</label>
    <input type="text" class="form-control" name="Año" value="{{ isset($libro->Año)?$libro->Año:old('Año') }}" id="Año">
</div>

    <input class="btn btn-success" type="submit" value="{{$modo}} Libro">

    <a class="btn btn-primary" href="{{ url('libro/') }}">Regresar</a>