<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- JavaScript Opcional-->
    <!-- Primero jQuery, Segundo Popper.js, Tercero Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>

    <!-- Fichero de estilo personalizado -->
    <link rel="stylesheet" href="{!!asset ('css/custom.css')!!}">

    <!-- Font Awesome 5 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JavaScript lógica test -->
    @isset($enableScriptTest)
        @if ($enableScriptTest == true)
            <script src="{!! asset('js/utilidades.js') !!}"></script>
            <script src="{!! asset('js/globals.js') !!}"></script>
            <script src="{!! asset('js/JSON/api_rest.js') !!}"></script>    

            <script src="{!! asset('js/MateriaModel.js') !!}"></script>
            <script src="{!! asset('js/TestModel.js') !!}"></script>
            <script src="{!! asset('js/TestView.js') !!}"></script>
            <script src="{!! asset('js/TestController.js') !!}"></script>
            
        @endif
    @endisset

    <title>BrainBoost</title>
</head>
