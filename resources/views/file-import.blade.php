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
            TGMS Import  CSV & Excel to Database
        </h2>

        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('file-Import.recettes') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <label for="">Import Recettes</label>
                            <input type="file" name="file_recettes" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Recettes file</label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Import Recettes</button>
                </form>
            </div>
            <br>
            <div class="col-lg-12">
                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <label for="">Import Dysfonctionements</label>
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Dysfonctionements file</label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Import Dysfonctionements</button>
                </form>
            </div>
            <br>
            <div class="col-lg-12">
                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <label for="">Import Passage manuel</label>
                            <input type="file" name="file_passage_manuel" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Passage Manuel</label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Import Passage manuel</button>
                </form>
            </div>
            <br>
            <div class="col-lg-12">
                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <label for="">Import Comptage</label>
                            <input type="file" name="file_comptage" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">fichier comptage</label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Import Comptage</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>
