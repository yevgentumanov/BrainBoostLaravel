@extends('plantillas.base')

@section('main')
    <main class="row w-100 m-0">
        <div class="col-12">
            {{-- Insercion del bloque de registro --}}
            @include('fragmentos.registro')
        </div>
    </main>
@endsection
