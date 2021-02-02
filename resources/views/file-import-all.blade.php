<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel & CSV to Database in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
           TGMS EXPORT DATA
        </h2>

        <a class="btn btn-success" href="{{ route('file-export.recettes') }}">Export data Recettes</a>
        <a class="btn btn-success" href="{{ route('file-export.gate') }}">Export data Passage Gate</a>
        <a class="btn btn-success" href="{{ route('file-export.uhf') }}">Export data Passage UHF</a>
        <a class="btn btn-success" href="{{ route('file-export.manuel') }}">Export data Passage Manuel</a>
        <a class="btn btn-success" href="{{ route('file-export.disfonct') }}">Export data Dysfonctionement</a>
        <a class="btn btn-success" href="{{ route('file-export.comptage') }}">Export data Comptage</a>

       
    </div>
</body>

</html>