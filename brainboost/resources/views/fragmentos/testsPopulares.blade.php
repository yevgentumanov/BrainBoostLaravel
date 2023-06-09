@php
    $popularTestResults = app('App\Http\Controllers\TestController')->getPopularTests();
    $count = count($popularTestResults['popularTests']);
@endphp

<section id="test-populares" class="row bg-primary p-4 ml-2 mr-2">
    <div class="row w-100 m-0">
        <div class="col-12 d-flex justify-content-center">
            <h2>Test más populares</h2>
        </div>
        <div class="col-12 d-flex justify-content-center col-xl-9 p-0">
            <div class="row w-100 m-0">
                @for($i = 0; $i < min($count, 6); $i++)
                    @php
                        $popTestRes = $popularTestResults['popularTests'][$i];
                    @endphp
                    <div class="col-6 col-md-4 col-lg-2 mb-4">
                        <article class="border border-box m-2 d-flex justify-content-center btn-5 h-100 m-0">
                            <div class="row w-100 m-0">
                                <div class="col-12">
                                    <a class="row w-100 m-0 d-flex justify-content-center pt-3"
                                       href="{{ route('test', ['idTest' => $popTestRes['id']]) }}">
                                        <img class="col-12 p-0" style="margin: inherit;"
                                             src="{!! asset('images/test.png') !!}"
                                             alt="logo" style="width:40px;">
                                    </a>
                                </div>
                                <div class="col-12  d-flex justify-content-center text-center">
                                    <h3 class="text-wrap t-test">{{ $popTestRes['nombre_test'] }}</h3>
                                </div>
                            </div>
                        </article>
                    </div>
                @endfor
            </div>
        </div>
        {{-- SOLO VISIBLES PARA TAMAÑO ESCRITORIO --}}
        <div class="d-none d-xl-block col-xl-3 p-0">
            <div class="row w-100 m-0 h-100">
                @for($i = 6; $i < min($count, 8); $i++)
                    @php
                        $popTestRes = $popularTestResults['popularTests'][$i];
                    @endphp
                    <div class="col-6 mb-4">
                        <article class="border border-box m-2 d-flex justify-content-center btn-5 h-100 m-0">
                            <div class="row w-100 m-0">
                                <div class="col-12">
                                    <a class="row w-100 m-0 d-flex justify-content-center pt-3"
                                       href="{{ route('test', ['idTest' => $popTestRes['id']]) }}">
                                        <img class="col-12 p-0" style="margin: inherit;"
                                             src="{!! asset('images/test.png') !!}"
                                             alt="logo" style="width:40px;">
                                    </a>
                                </div>
                                <div class="col-12  d-flex justify-content-center text-center">
                                    <h3 class="text-wrap t-test">{{ $popTestRes['nombre_test'] }}</h3>
                                </div>
                            </div>
                        </article>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>
