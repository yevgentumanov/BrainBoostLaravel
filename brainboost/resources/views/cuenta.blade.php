@extends('plantillas.base')

@section('main')
    <main class="row">
        <div class="col-4 m-0 p-4">
            {{-- Insercion del bloque de cuenta de usuario --}}
            @include('fragmentos.cuenta')
        </div>
        <div class="col-8 m-0 pt-4 pr-4 pb-4">
            {{-- Insercion del bloque de cuenta de estadísticas del usuario --}}
            @include('fragmentos.estadistica')
        </div>
    </main>
@endsection
