@extends('plantillas.base')

@section('main')
    <main class="row">
        <div class="col-12">
            <section class="row bg-primary m-4">
                <div class="col-2 p-4">
                    <img style="width: inherit;" src="{!! asset('images/materia' . $materia->id . '.jpg') !!}" alt="test">
                </div>
                <div class="col-10 p-4">
                    <div class="col-12">
                        <h2>{{ $materia->nombre_materia }}</h2>
                    </div>
                    <div class="col-12">
                        <p>{{ $materia->descripcion }}</p>
                    </div>
                </div>
            </section>

            @foreach ($tests as $test)
                <section class="row bg-primary m-4 ">
                    <div class="col-11 p-2">{{ $test->nombre_test }} </div>
                    <div class="col-1 p-2">
                        (10 preguntas)
                    </div>
                </section>
            @endforeach
    </main>
@endsection
