@extends('plantillas.base')

@section('main')
    <main class="row">
        <div class="col-12">
            {{-- Insercion del bloque de registro --}}
            @include('fragmentos.login')
        </div>
    </main>
@endsection
