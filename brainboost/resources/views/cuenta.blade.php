@extends('plantillas.base')

@section('main')
    <main class="row">
        <div class="col-4 pl-1 pr-0 pt-4 pb-4">
            {{-- Insercion del bloque de cuenta de usuario --}}
            @include('fragmentos.cuenta')
        </div>
        <div class="col-8 pl-0 pr-0 pt-4 pb-4">
            {{-- Insercion del bloque de cuenta de estadísticas del usuario --}}
            @include('fragmentos.estadistica')
        </div>
    </main>
@endsection
