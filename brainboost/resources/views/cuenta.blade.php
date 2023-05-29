@extends('plantillas.base')

@section('main')
    <main class="row">
        <div class="col-12">

            {{-- Insercion del bloque de cuenta de usuario --}}
            @include('fragmentos.cuenta')
            {{-- Insercion del bloque de cuenta de estadísticas del usuario --}}
            @include('fragmentos.estadistica')


        </div>
    </main>
@endsection
