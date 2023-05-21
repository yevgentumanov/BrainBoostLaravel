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
                <a href="{{ route('test', ['test' => $test->id]) }}">
                    <section class="row bg-primary m-4 d-flex justify-content-center">
                        <div class="col-2 p-2">{{ $test->nombre_test }}</div>
                        <div class="col-8 p-2 text-center">{{ $test->descripcion }}</div>
                        <div class="col-2 p-2 text-right">(10 preguntas)</div>
                    </section>
                </a>
            @endforeach
    </main>
@endsection
