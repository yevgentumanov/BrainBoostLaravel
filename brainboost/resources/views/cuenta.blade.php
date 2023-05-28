@extends('plantillas.base')

@section('main')
    <main class="row">
        <div class="col-12">
            <h1>Cuenta usuario</h1>
            <form method="POST" action="{{ route('cambiarpassword') }}">
                @csrf

                <div class="form-group">
                    <label for="nombre_usuario">Nombre de usuario</label>
                    <input type="text" id="nombre_usuario" name="nombre_usuario" value="{{ auth()->user()->nombre_usuario }}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="password_actual">Contraseña actual</label>
                    <input type="password" id="password_actual" name="password_actual" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nueva_password">Nueva contraseña</label>
                    <input type="password" id="nueva_password" name="nueva_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="confirmar_password">Confirmar contraseña</label>
                    <input type="password" id="confirmar_password" name="confirmar_password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </main>
@endsection
