@extends('plantillas.base')

@section('main')
    <main class="row w-100 m-0">
        <div class="col-12 pl-0 pr-0 pt-4 pb-4 cuerpo">

            <div class="container">
                <div class="row justify-content-center">
                    <div id="divregistro" class="col-md-12">
                        <div class="card pb-2">
                            <div id="v-texto" class="card-body bg-primary">
                                <h1>Verificacion de correo</h1>
                                <div class="col-12">
                                    <h3>¡Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu dirección de
                                        correo
                                        electrónico haciendo clic en el enlace que te acabamos de enviar por correo? Si
                                        no recibiste
                                        el correo electrónico, estaremos encantados de enviarte otro. ¡Bienvenido/a al
                                        proyecto
                                        BrainBoost.es!</h3>
                                </div>
                            </div>
                            <div class="mt-4 row justify-content-center">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf

                                    <div>
                                        <button type="submit" class="btn btn-light btn-5 px-4 py-2 rounded-md">Volver a enviar
                                        </button>
                                    </div>
                                </form>

                                <form method="POST" action="{{ route('salir') }}">
                                    @csrf

                                    <button type="submit" class="bg-red-500 px-4 py-2 ml-2 rounded-md"> Salir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
