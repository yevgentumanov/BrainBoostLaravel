@php
    $recienteTestResults = app('App\Http\Controllers\VIntentosTestController')->ultimosTestRealizados();
    $count = count($recienteTestResults);
@endphp
@if(isset($recienteTestResults[0]))
<section id="test-recientes" class="row bg-primary seccion-mb p-4 ml-2 mr-2">
    <div class="row">
        <div class="col-12 d-flex justify-content-center text-center">
            <h2>Test realizados recientemente</h2>
        </div>
        <div class="col-12 d-flex justify-content-center col-xl-9 p-0">
            <div class="row w-100 m-0">
                @for($i = 0; $i < min($count, 6); $i++)
                    @php
                        $recTestRes = $recienteTestResults[$i];
                    @endphp
                    <div class="col-6 col-md-4 col-lg-2">
                        <article class="border border-box m-2 d-flex justify-content-center btn-5">
                            <div class="row">
                                <div class="col-12">
                                    <a class="row d-flex justify-content-center pt-3"
                                       href="{{ route('test', ['idTest' => $recTestRes->id_test]) }}">
                                        <img class="col-12" style="margin: inherit;"
                                             src="{!! asset('images/test.png') !!}"
                                             alt="logo" style="width:40px;">
                                    </a>
                                </div>
                                <div class="col-12  d-flex justify-content-center">
                                    <h3>{{ $recTestRes->test->nombre_test }}</h3>
                                </div>
                            </div>
                        </article>
                    </div>
                @endfor
            </div>
        </div>
        {{-- SOLO VISIBLES PARA TAMAÑO ESCRITORIO --}}
        <div class="d-none d-xl-block col-xl-3 p-0">
            <div class="row w-100 m-0">
                @for($i = 6; $i < min($count, 8); $i++)
                    @php
                        $recTestRes = $recienteTestResults[$i];
                    @endphp
                    <div class="col-6">
                        <article class="border border-box m-2 d-flex justify-content-center btn-5">
                            <div class="row">
                                <div class="col-12">
                                    <a class="row d-flex justify-content-center pt-3" href="#">
                                        <img class="col-12" style="margin: inherit;"
                                             src="{!! asset('images/test.png') !!}"
                                             alt="logo" style="width:40px;">
                                    </a>
                                </div>
                                <div class="col-12  d-flex justify-content-center">
                                    <h3>Test 1</h3>
                                </div>
                            </div>
                        </article>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>
@endif
