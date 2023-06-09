@extends('plantillas.base')

@section('main')
    <main class="row w-100 m-0">
        <div class="row w-100 m-0 cuerpo">
            <div class="col-2 d-none d-md-block d-lg-none"></div>
            <div class="col-12 col-md-8 col-lg-5 col-xl-4 pl-1 pr-0 pt-4 pb-4">
                {{-- Insercion del bloque de cuenta de usuario --}}
                @include('fragmentos.cuenta')
            </div>
            <div class="col-12 col-lg-7 col-xl-8 pl-0 pr-0 pt-4 pb-4">
                {{-- Insercion del bloque de cuenta de estadísticas del usuario --}}
                @include('fragmentos.estadistica')
            </div>
        </div>
    </main>
@endsection
