<!-- Hereda la plantilla general -->
@extends('plantillas.base', ['enableScriptTest' => true])

<!-- Página de test -->
@section('main')
    <main class="row">
        <div class="col-12">
            <section class="row bg-primary m-4">
                <div class="col-12 m-2">
                    <h3>TEST - {{ $test->nombre_test }}</h3>
                </div>
            </section>

            {{-- Solo usar con fines de testing --}}
            {{-- @isset($test)
                <section class="row bg-primary m-4">
                    <div class="col-12 m-2">

                        @dump($test)

                    </div>
                </section>
            @endisset --}}

            <script>
                const rutaDesglosada = document.location.href.split("/");
                const id = Number.parseInt(rutaDesglosada[rutaDesglosada.length - 1]);

                let test1 = new Test();
                let testController1 = new TestController(test1);
                // test1.downloadQuestionsByIdTest(id);
                testController1.downloadQuestionsByIdTest(id);
                console.log(test1);
            </script>

            @isset($preguntas)
                @foreach ($preguntas as $pregunta)
                    @if ($pregunta->tipo_pregunta == 1)
                        <section class="row bg-primary m-4 ">
                            <div class="col-12 p-2 px-4">
                                <h4>
                                    Pregunta {{ $loop->iteration }}:
                                </h4>
                            </div>
                            <label class="p-2 px-4 font-weight-bold">{{ $pregunta->nombre_pregunta }}</label>
                            <div class="col-12">
                                <?php
                                $datos = json_decode($pregunta->datos_pregunta);
                                $respuestas = $datos->respuestas;
                                // $respuestasCorrectas = $datos->respuestas_correctas;
                                ?>

                                <ul class="col-12">
                                    @foreach ($respuestas as $key => $respuesta)
                                        <ul>
                                            <input type="radio" id="respuesta{{ $key }}"
                                                name="respuesta{{ $loop->parent->index }}" value="{{ $respuesta }}">
                                            <label for="respuesta{{ $key }}">{{ $respuesta }}</label>
                                        </ul>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    @endif
                @endforeach
            @endisset
            {{--
            <section class="row bg-primary m-4 ">
                <div class="col-11 p-2">
                    <h4>
                        Pregunta 1:
                    </h4>
                    <label>Enunciado de la pregunta</label>
                </div>
                <div class="col-12 p-2">
                    <label class="col-12">respuesta 1</label>
                    <label class="col-12">respuesta 2</label>
                    <label class="col-12">respuesta 3</label>
                    <label class="col-12">respuesta 4</label>
                </div>
            </section>
            <section class="row bg-primary m-4 ">
                <div class="col-11 p-2">
                    <h4>
                        Pregunta 2:
                    </h4>
                    <label>Enunciado de la pregunta</label>
                </div>
                <div class="col-12 p-2">
                    <label class="col-12">respuesta 1</label>
                    <label class="col-12">respuesta 2</label>
                    <label class="col-12">respuesta 3</label>
                    <label class="col-12">respuesta 4</label>
                </div>
            </section>
            <section class="row bg-primary m-4 ">
                <div class="col-11 p-2">
                    <h4>
                        Pregunta 3:
                    </h4>
                    <label>Enunciado de la pregunta</label>
                </div>
                <div class="col-12 p-2">
                    <label class="col-12">respuesta 1</label>
                    <label class="col-12">respuesta 2</label>
                    <label class="col-12">respuesta 3</label>
                    <label class="col-12">respuesta 4</label>
                </div>
            </section>
            <section class="row bg-primary m-4 ">
                <div class="col-11 p-2">
                    <h4>
                        Pregunta 4:
                    </h4>
                    <label>Enunciado de la pregunta</label>
                </div>
                <div class="col-12 p-2">
                    <label class="col-12">respuesta 1</label>
                    <label class="col-12">respuesta 2</label>
                    <label class="col-12">respuesta 3</label>
                    <label class="col-12">respuesta 4</label>
                </div>
            </section>
            <section class="row bg-primary m-4 ">
                <div class="col-11 p-2">
                    <h4>
                        Pregunta 5:
                    </h4>
                    <label>Enunciado de la pregunta</label>
                </div>
                <div class="col-12 p-2">
                    <label class="col-12">respuesta 1</label>
                    <label class="col-12">respuesta 2</label>
                    <label class="col-12">respuesta 3</label>
                    <label class="col-12">respuesta 4</label>
                </div>
            </section>
            <section class="row bg-primary m-4 ">
                <div class="col-11 p-2">
                    <h4>
                        Pregunta 6:
                    </h4>
                    <label>Enunciado de la pregunta</label>
                </div>
                <div class="col-12 p-2">
                    <label class="col-12">respuesta 1</label>
                    <label class="col-12">respuesta 2</label>
                    <label class="col-12">respuesta 3</label>
                    <label class="col-12">respuesta 4</label>
                </div>
            </section>
            <section class="row bg-primary m-4 ">
                <div class="col-11 p-2">
                    <h4>
                        Pregunta 7:
                    </h4>
                    <label>Enunciado de la pregunta</label>
                </div>
                <div class="col-12 p-2">
                    <label class="col-12">respuesta 1</label>
                    <label class="col-12">respuesta 2</label>
                    <label class="col-12">respuesta 3</label>
                    <label class="col-12">respuesta 4</label>
                </div>
            </section>
            <section class="row bg-primary m-4 ">
                <div class="col-11 p-2">
                    <h4>
                        Pregunta 8:
                    </h4>
                    <label>Enunciado de la pregunta</label>
                </div>
                <div class="col-12 p-2">
                    <label class="col-12">respuesta 1</label>
                    <label class="col-12">respuesta 2</label>
                    <label class="col-12">respuesta 3</label>
                    <label class="col-12">respuesta 4</label>
                </div>
            </section>
            <section class="row bg-primary m-4 ">
                <div class="col-11 p-2">
                    <h4>
                        Pregunta 9:
                    </h4>
                    <label>Enunciado de la pregunta</label>
                </div>
                <div class="col-12 p-2">
                    <label class="col-12">respuesta 1</label>
                    <label class="col-12">respuesta 2</label>
                    <label class="col-12">respuesta 3</label>
                    <label class="col-12">respuesta 4</label>
                </div>
            </section>
            <section class="row bg-primary m-4 ">
                <div class="col-11 p-2">
                    <h4>
                        Pregunta 10:
                    </h4>
                    <label>Enunciado de la pregunta</label>
                </div>
                <div class="col-12 p-2">
                    <label class="col-12">respuesta 1</label>
                    <label class="col-12">respuesta 2</label>
                    <label class="col-12">respuesta 3</label>
                    <label class="col-12">respuesta 4</label>
                </div>
            </section> --}}
        </div>
    </main>
@endsection
