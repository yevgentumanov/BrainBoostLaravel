<!-- Código Blade para el formulario de inicio de sesión -->
<form action="{{ route('logintoapp') }}" method="POST">
    @csrf
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
</form>
