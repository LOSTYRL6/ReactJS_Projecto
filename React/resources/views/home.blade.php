@extends('layouts.LayoutsPrincipal')

@section('Imagenfondo')
    <img src="{{ asset('Imagen/Backgrounds/MiLogoBackgrounds.png') }}" alt="my logo" class="background-img">
@endsection

@section('LayoustMain')
    @if (Auth::check())
        <h1>Bienvenido, {{ Auth::user()->username }}</h1>
    @else
        <p>No has iniciado sesión.</p>
    @endif

    <div id="MenuSouls" class="MenuDeLosJuegos">

    </div>
@endsection
