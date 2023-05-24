@extends('plantillas.base')

@section('main')
    <main class="row">
        <div class="col-12">
            {{-- Insercion del bloque de registro --}}
            @include('fragmentos.registro')
        </div>
    </main>
@endsection
