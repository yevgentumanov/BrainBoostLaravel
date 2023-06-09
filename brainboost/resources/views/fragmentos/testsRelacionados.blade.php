@php
    $sugeridosTestResults6 = app('App\Http\Controllers\TestController')->testSugeridos(6);
    $sugeridosTestResults2 = app('App\Http\Controllers\TestController')->testSugeridos(2);
@endphp

<section id="test-relacionados" class="row bg-primary seccion-mb p-4 ml-2 mr-2">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <h2>Test sugeridos</h2>
        </div>
        <div class="col-12 d-flex justify-content-center col-xl-9 p-0">
            <div class="row w-100 m-0">
                @foreach($sugeridosTestResults6['randomTests'] as $sugTestResult)
                    <div class="col-6 col-md-4 col-lg-2">
                        <article class="border border-box m-2 d-flex justify-content-center btn-5">
                            <div class="row">
                                <div class="col-12">
                                    <a class="row d-flex justify-content-center pt-3"
                                       href="{{ route('test', ['idTest' => $sugTestResult['id']]) }}">
                                        <img class="col-12" style="margin: inherit;"
                                             src="{!! asset('images/test.png') !!}"
                                             alt="logo" style="width:40px;">
                                    </a>
                                </div>
                                <div class="col-12  d-flex justify-content-center">
                                    <h3>{{ $sugTestResult->nombre_test }}</h3>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- SOLO VISIBLES PARA TAMAÑO ESCRITORIO --}}
        <div class="d-none d-xl-block col-xl-3 p-0">
            <div class="row w-100 m-0">
                @foreach($sugeridosTestResults2['randomTests'] as $sugTestResult)
                    <div class="col-6">
                        <article class="border border-box m-2 d-flex justify-content-center btn-5">
                            <div class="row">
                                <div class="col-12">
                                    <a class="row d-flex justify-content-center pt-3" href="#">
                                        <div class="col-12">
                                            <a class="row d-flex justify-content-center pt-3"
                                                href="{{ route('test', ['idTest' => $sugTestResult['id']]) }}">
                                                <img class="col-12" style="margin: inherit;"
                                                     src="{!! asset('images/test.png') !!}"
                                                     alt="logo" style="width:40px;">
                                            </a>
                                </div>
                                <div class="col-12  d-flex justify-content-center">
                                    <h3>{{ $sugTestResult->nombre_test }}</h3>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
