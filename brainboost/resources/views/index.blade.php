@extends('plantillas.base')

@section('main')

    <main class="row">
        <div class="col-12">

            @auth
            {{-- Inserción del bloque de test Recientes si el usuario esta logueado--}}
            @include('fragmentos.testsRecientes')
            {{-- Inserción del bloque de test Relacionados si el usuario esta logueado--}}
            @include('fragmentos.testsRelacionados')
            cd @endauth
            {{-- Inserción del bloque de test Populares --}}
            @include('fragmentos.testsPopulares')
        </div>
    </main>

@endsection
