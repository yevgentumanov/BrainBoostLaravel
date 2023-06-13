@extends('plantillas.base')

@section('main')
    <main class="row w-100 m-0">
        <div class="col-12 pl-0 pr-0 pt-4 pb-4">

            <!-- Formulario de recuperacion de contraseña -->
            <div id="pasresset" class="container superpuesto" tabindex="0">
                <div class="row w-100 m-0 justify-content-center">
                    <div id="divlogin" class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 p-0">
                        <div class="card sombra_borde card-portada">
                            <div class="card-body pt-0">
                                <div class="row w-100 m-0 d-flex justify-content-end">
                                    <div class="exit-card text-right p-0">X</div>
                                </div>
                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">Correo electrónico</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>

                                    <div class="row justify-content-center pt-3 pl-5 pr-5">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-5">Enviar enlace de restablecimiento de contraseña</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
