@extends('plantillas.base')

@section('main')
    <main class="row">
        <div class="col-12 pl-0 pr-0 pt-4 pb-4">
            {{-- Fragmento con el historial de todos los test realizados --}}
            @include('fragmentos.historialTodasLasPreguntasRespondidas')
        </div>
    </main>
@endsection
