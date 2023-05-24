<!-- Código Blade para el formulario de registro -->
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
        <input type="email" id="email_confirmation" name="email_confirmation" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirmar contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
               required>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
