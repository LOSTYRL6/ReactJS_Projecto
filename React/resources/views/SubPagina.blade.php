@extends('layouts.LayoutsPrincipal')

@section('Imagenfondo')
    <img src="{{ asset('Imagen/Backgrounds/MiLogoBackgrounds.png') }}" alt="my logo" class="background-img">
@endsection
@section('LayoustMain')
    <h1>{{ $pagina->nombre }}</h1>
    <h1>{{ $pagina->id_pagina }}</h1>
    <div class="todosLosContenidoDelSubPagina">
        <div class="PropiaCategoria">
            <div class="tituloCategoria">
                <h1>Categoria del Armas</h1>
            </div>
        </div>
    </div>
@endsection
