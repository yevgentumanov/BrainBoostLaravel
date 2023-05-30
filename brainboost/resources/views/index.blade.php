@extends('plantillas.base')

@section('main')

    <main class="row">
        <div class="col-12">
            {{-- Inserción del bloque de test Recientes --}}
            @include('fragmentos.testsRecientes')
            {{-- Inserción del bloque de test Relacionados --}}
            @include('fragmentos.testsRelacionados')
            {{-- Inserción del bloque de test Populares --}}
            @include('fragmentos.testsPopulares')
        </div>
    </main>

@endsection
