<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
    <h3 class="center">Listado de libros en existencia</h3>
    <hr>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Portada</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Descripcion</th>
                <th>Editorial</th>
                <th>Pais</th>
            </tr>
        </thead>
    
        <tbody>
            @foreach ($libros as $libro)  
            <tr>
                <td>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$libro->Portada }}" alt="">
                </td>
                
                <td>{{ $libro->Titulo }}</td>
                <td>{{ $libro->Autor }}</td>
                <td>{{ $libro->Descripcion }}</td>
                <td>{{ $libro->Editorial }}</td>
                <td>{{ $libro->Pais }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>