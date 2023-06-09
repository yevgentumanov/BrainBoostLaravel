@extends('plantillas.base')

@section('main')
    <main class="row w-100 m-0">
        <div class="row w-100 m-0 d-flex p-4 cuerpo">
            <section class="row bg-primary seccion-mb s-materia">
                <div class="col-sm-1 col-md-2 d-lg-none"></div>
                <div class="col-12 col-sm-10 col-md-8 col-lg-4 p-4">
                    <img style="width: inherit;" src="{!! asset('images/materia' . $materia->id . '.jpg') !!}" alt="test">
                </div>
                <div class="col-12 col-lg-8 p-4">
                    <div class="col-12">
                        <h2>{{ $materia->nombre_materia }}</h2>
                    </div>
                    <div class="col-12">
                        <p>{{ $materia->descripcion }}</p>
                    </div>
                </div>
            </section>

            @foreach ($tests as $test)
                <a class="w-100 seccion-mb realzado" href="{{ route('test', ['idTest' => $test->id, 'name' => $test->nombre_test]) }}">
                    <section class="row bg-primary ml-4 mr-4 d-flex justify-content-center">
                        <div class="col-6 col-sm-3 col-lg-2 d-left p-2">{{ $test->nombre_test }}</div>
                        <div class="col-sm-6 col-lg-8 d-none d-sm-block p-2 text-center">{{ $test->descripcion }}</div>
                        <div class="col-6 col-sm-3 col-lg-2 p-2 text-right">(10 preguntas)</div>
                    </section>
                </a>
            @endforeach
    </main>
@endsection
