@extends('layouts.AuthLayouts')

@section('Imagenfondo')
    <img src="{{ asset('Imagen/Backgrounds/darksouls.jpg') }}" alt="my logo" class="background-img">
@endsection

@section('ContendioAuth')
    <div class="salirBoton">
        <a href="{{ url('/') }}">
            <img src="{{ asset('imagen/logo/fogataonly.png') }}" alt="Salir">
        </a>
    </div>

    <div class="contenedorFormIniciarSesion">
        @include('partial.partial')

        <form action="{{ url('/Login') }}" method="POST" class="FormIniciarSesion">
            @csrf
            <h1 ref="tituloRef" class="tituloFuego">
                Iniciar Sesion
            </h1>

            <div class="formGroup">
                <label for="UsernameCorreo">Username / Correo Electronico</label>
                <input type="text" id="UsernameCorreo" name="UsernameCorreo" value="{{ old('UsernameCorreo') }}"
                    required />
                @error('UsernameCorreo')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="formGroup">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required />
                @error('contrasena')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btnEnviar">
                Enviar
            </button>
        </form>
    </div>
@endsection
