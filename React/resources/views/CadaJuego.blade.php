@extends('layouts.LayoutsPrincipal')

@section('Imagenfondo')
    <img src="{{ asset('Imagen/Backgrounds/MiLogoBackgrounds.png') }}" alt="my logo" class="background-img">
@endsection

@section('LayoustMain')
    <h1>{{ $juego->nombre }}</h1>
    <img src="{{ asset('imagen/game/' . $juego->imagen) }}" alt="{{ $juego->nombre }}">
@endsection
