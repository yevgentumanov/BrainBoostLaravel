@extends('plantillas.base')

@section('main')
    <main class="row">
        <div class="col-12">
            @foreach ($tests as $test)
                <a href="{{ route('test', ['idTest' => $test->id, 'name' => $test->nombre_test]) }}">
                    <section class="row bg-primary m-4 d-flex justify-content-center">
                        <div class="col-2 p-2">{{ $test->nombre_test }}</div>
                        <div class="col-8 p-2 text-center">{{ $test->descripcion }}</div>
                        <div class="col-2 p-2 text-right">(10 preguntas)</div>
                    </section>
                </a>
            @endforeach
    </main>
@endsection