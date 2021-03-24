@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/libro') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    @include('libro.form',['modo'=>'Ingresar']);

</form>
</div>
@endsection