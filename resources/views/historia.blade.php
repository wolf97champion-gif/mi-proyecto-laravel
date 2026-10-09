{{-- Extiende la plantilla que ya tenés (welcome.blade.php) --}}
@extends('welcome')

{{-- Título de la página --}}
@section('title', 'Archivo Histórico')

{{-- Contenido principal --}}
@section('content')
<div class="contenido-historia">
    <h1>📜 Archivo Histórico</h1>
    <p>Aquí va a vivir la sección de historia...</p>
    
    {{-- Todo tu contenido acá --}}
</div>
@endsection