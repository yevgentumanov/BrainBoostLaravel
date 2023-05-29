@extends('plantillas.base')

@section('main')
    <main class="row">
        <div class="col-12">

            {{-- Insercion del bloque de cuenta de usuario --}}

            @include('fragmentos.cuenta')

        </div>
    </main>
@endsection
