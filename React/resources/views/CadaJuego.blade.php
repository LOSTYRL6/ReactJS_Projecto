@extends('layouts.LayoutsPrincipal')

@section('Imagenfondo')
    <img src="{{ asset('Imagen/Backgrounds/MiLogoBackgrounds.png') }}" alt="my logo" class="background-img">
@endsection

@section('LayoustMain')
    <h1>{{ $juego->nombre }}</h1>
    <img src="{{ asset('imagen/game/' . $juego->imagen) }}" alt="{{ $juego->nombre }}">
    <div class="CategoriaDeJuegosSeccion">
        @foreach ($juego->paginas as $pagina)
            @if (strtolower($pagina->nombre) !== 'inicio')
                <a href="{{ route('paginas.show', ['id' => $pagina->id_pagina]) }}">
                    <div class="SeccionDelNombreDeCadaJuego">
                        <img src="{{ asset('imagen/media/' . $pagina->fotoDePaginas) }}" alt="{{ $pagina->fotoDePaginas }}">
                        <h1>{{ $pagina->nombre }}</h1>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
@endsection
@section('UsuariosComentarios')
    <div id="ComentariosDeLosUsuarios" data-juego='@json($juego)' data-pagina='@json($pagina)'
        data-user='@json(Auth::user())'></div>

    <div id="ComentariosSeccion" data-juego='@json($juego)' data-pagina='@json($pagina)'
        data-user='@json(Auth::user())'></div>
@endsection
