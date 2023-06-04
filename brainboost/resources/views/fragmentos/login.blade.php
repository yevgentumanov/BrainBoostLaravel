<div class="container superpuesto">
    <div class="row justify-content-center">
        <div id="divlogin" class="col-md-7">
            <div class="card sombra_borde">
                <div class="row justify-content-end">
                    <a class="exit-card" href="{{ route('index') }}">X</a>
                </div>
                <div class="card-body pt-0">
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
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success mr-3 ">Iniciar sesión</button>
                            <button type="submit" class="btn btn-default ml-3 ">Recuperar contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
