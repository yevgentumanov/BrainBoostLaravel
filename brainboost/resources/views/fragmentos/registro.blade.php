<!-- Código Blade para el formulario de registro -->

<div class="container superpuesto">
    <div class="row justify-content-center">
        <div id="divregistro" class="col-md-6">
            <div class="card ">
                <div class="card-body bg-primary pt-0">
                    <div class="row justify-content-end">
                        <a class="exit-card" href="{{ route('index') }}">X</a>
                    </div>
                    <form action="{{ route('registrar') }}" method="POST">
                        @csrf
                        @if(session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="nombre_usuario">Nombre de usuario</label>
                            <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email_confirmation">Confirmar correo electrónico</label>
                            <input type="email" id="email_confirmation" name="email_confirmation" class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar contraseña</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
