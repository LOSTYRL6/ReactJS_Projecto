@extends('layouts.LayoutsPrincipal')

@section('Imagenfondo')
    <img src="{{ asset('Imagen/Backgrounds/darksoulsgif.gif') }}" alt="my logo" class="background-img">
@endsection

@section('LayoustMain')
    <h1>Hola Tarnsihed</h1>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    @if (Auth::check())
        <p>Bienvenido, {{ Auth::user()->username }}</p>
    @else
        <p>No has iniciado sesión.</p>
    @endif
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
    <p>asasasas00</p>
@endsection
