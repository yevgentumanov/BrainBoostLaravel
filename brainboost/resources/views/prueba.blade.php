<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<!-- Llamada a popularesTestRealizados()  -->
@php
    $popularesTests = app('App\Http\Controllers\VIntentosTestController')->popularesTestRealizados();
    dd($popularesTests);
@endphp
</body>
</html>
