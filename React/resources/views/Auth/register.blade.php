@extends('layouts.AuthLayouts')
@section('Imagenfondo')
<img src="{{ asset('Imagen/Backgrounds/LiesOfP.jpg') }}" alt="my logo"  class="background-img">
@endsection
@section('ContendioAuth')

<div class="salirBoton">
    <a href="{{ url('/') }}">
        <img src="{{ asset('imagen/logo/fogataonly.png') }}" alt="Salir">
    </a>

</div>
<div id="Registrarse" class="contenedorForm">
</div>
@endsection

