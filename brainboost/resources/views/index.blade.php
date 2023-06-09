@extends('plantillas.base')

@auth
    @section('main')
        <main class="row w-100 m-0">
            <div class="col-12 p-4 cuerpo">

                {{-- Inserción del bloque de test Relacionados si el usuario esta logueado --}}
                @include('fragmentos.testsRelacionados')

                {{-- Inserción del bloque de test Populares --}}
                @include('fragmentos.testsPopulares')

                {{-- Inserción del bloque de test Recientes si el usuario esta logueado --}}
                @include('fragmentos.testsRecientes')

            </div>
        </main>
    @endsection
@else

@endauth
