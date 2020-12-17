
@extends('template')
@section('title')
    Idé-Log
@endsection
@section('style-css')
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/select2/select2.min.css')}}">

@endsection()

@section('header-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Idé-Log
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active"> Formation</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        @endsection
        @section('content')
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                        </div>


                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">
                            <a href="{{route('recettes-trafics.index')}}"  class="btn btn-primary">Retour vers la liste</a>

                        </div>
                    </div>
                    <h4 class="element-header">Recette\ Trafic</h4>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12">
                    {{--      @include('partials.notification')--}}
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="form-header">Ajouter une recette</h5>

                        </div>

                        <div class="card-body">
                            <form action="{{route('recettes-trafics.store')}}" method="post" class="form">

                                @csrf

                                <div class="row">
                                    <div class="col-lg-4 col-md-4">

                                        <label for="">Date</label>

                                        <input type="date" value="{{ $recetteTrafic->date }}" id="date" name="date" class="form-control" required>
                                    </div>

                                    <div class="col-lg-4 col-md-4">

                                        <label for="">Site</label>

                                        <select name="site_id" value="{{ $recetteTrafic->site_id }}" id="site_id" class="form-control">

                                            @foreach ($sites as $site)
                                            <option value="{{ $site->id }}">{{ $site->libelle }}</option>
                                                
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-lg-4 col-md-4">

                                        <label for="">Voie</label>
                                        <select name="voie_id" value="{{ $recetteTrafic->voie_id }}" id="voie_id" class="form-control">

                                            @foreach ($voies as $voie)
                                            <option value="{{ $voie->id }}">{{ $voie->libelle }}</option>
                                                
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4">

                                        <label for="">Vacation</label>

                                        <select name="vacation" value="{{ $recetteTrafic->vacation }}" id="vacation" class="form-control">


                                                <option value="{{ env('TYPE_VACATION_06H')}}">{{ env('TYPE_VACATION_06H')}}</option>
                                            <option value="{{ env('TYPE_VACATION_14H')}}">{{ env('TYPE_VACATION_14H')}}</option>
                                            <option value="{{ env('TYPE_VACATION_20H')}}">{{ env('TYPE_VACATION_20H')}}</option>

                                        </select>

                                    </div>

                                    <div class="col-lg-4 col-md-4">

                                        <label for="">Agent</label>
                                        <input type="text" id="agent_voie" value="{{ $recetteTrafic->agent_voie }}" name="agent_voie" class="form-control" required>

                                    </div>
                                    <div class="col-lg-4 col-md-4">

                                        <label for="">Montant</label>
                                        <input type="number" id="montant" value="{{ $recetteTrafic->montant }}" name="montant" class="form-control" required>


                                    </div>
                                </div>
                                <br>


                                <br>



                                <fieldset>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">

                                            <label for="">Recettes Informatisée</label>
                                            <input type="number" name="recette_informatiser" value="{{ $recetteTrafic->recette_informatiser }}" id="recette_informatiser" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-md-4">

                                            <label for="">Recettes Déclarée</label>
                                            <input type="number" name="recette_declarer" value="{{ $recetteTrafic->recette_declarer }}" id="recette_declarer" class="form-control">
                                        </div>

                                        <div class="col-lg-4 col-md-4">

                                            <label for="">Manquant</label>
                                            <input type="number" name="manquant" value="{{ $recetteTrafic->manquant }}" id="manquant" class="form-control">
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">

                                            <label for="">Suplus</label>
                                            <input type="number" name="supplus" value="{{ $recetteTrafic->supplus }}" id="supplus" class="form-control" required>
                                        </div>
                                        <div class="col-lg-4 col-md-4">

                                            <label for="">VL</label>
                                            <input type="number" name="vl" value="{{ $recetteTrafic->vl }}" id="vl" class="form-control" required>
                                        </div>

                                        <div class="col-lg-4 col-md-4">

                                            <label for="">mini_bus</label>
                                            <input type="number" name="mini_bus" value="{{ $recetteTrafic->mini_bus }}" id="mini_bus" class="form-control" required>
                                        </div>

                                    </div>
                                </fieldset>


                                <br>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">

                                        <label for="">Autocars camion</label>
                                        <input type="number" name="autocars_camion" value="{{ $recetteTrafic->autocars_camion }}" id="autocars_camion" class="form-control" required>
                                    </div>
                                    <div class="col-lg-4 col-md-4">

                                        <label for="">PL</label>
                                        <input type="number" name="pl" value="{{ $recetteTrafic->pl }}" id="pl" class="form-control" required>
                                    </div>

                                    <div class="col-lg-4 col-md-4">

                                        <label for="">Nombre Exempté</label>
                                        <input type="number" name="nbre_exempte" value="{{ $recetteTrafic->nbre_exempte }}" id="nbre_exempte" class="form-control" required>
                                    </div>

                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">

                                        <label for="">Violation</label>
                                        <input type="number" name="violation" value="{{ $recetteTrafic->violation }}" id="violation" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6">

                                        <label for="">total</label>
                                        <input type="number" name="total" value="{{ $recetteTrafic->total }}" id="total" class="form-control" required>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <label for="">Observation</label>

                                        <textarea name="observation" value="{{ $recetteTrafic->observation }}" id="observation" cols="30" rows="10" class="form-control"></textarea>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" value="Modifier" class="btn btn-success">

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </section>
        @endsection
        @section('custmo-js')
            <script src="{{asset('AdminLTE/plugins/select2/select2.full.min.js')}}"></script>

            <script>
                $(function () {
                    //Initialize Select2 Elements
                    $('.select2').select2()



                })
            </script>
@endsection
