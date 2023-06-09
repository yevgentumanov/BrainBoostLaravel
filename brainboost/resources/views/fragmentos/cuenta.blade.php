<div class="container">
    <div class="row justify-content-left">
        <div id="divregistro" class="col-md-12">
            <section class="card-body bg-primary">
                <h1>Cuenta usuario</h1>
                <form method="POST" action="{{ route('cambiarpassword') }}">
                    @csrf

                    <div class="row d-flex justify-content-center">
                        <img class="card-img-top col-5 p-3" src="{!! asset('images/usuario.jfif') !!}" alt="Card image"
                            style="width:100%">
                    </div>

                    <div class="form-group">
                        <label for="nombre_usuario">Nombre de usuario</label>
                        <input type="text" id="nombre_usuario" name="nombre_usuario"
                            value="{{ auth()->user()->nombre_usuario }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="password_actual">Contraseña actual</label>
                        <input type="password" id="password_actual" name="password_actual" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="nueva_password">Nueva contraseña</label>
                        <input type="password" id="nueva_password" name="nueva_password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="confirmar_password">Confirmar contraseña</label>
                        <input type="password" id="confirmar_password" name="confirmar_password" class="form-control"
                            required>
                    </div>

                    <div class="col-12 text-center mt-2">
                        <button id="btn-save" type="submit" class="btn btn-5">Guardar cambios</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
