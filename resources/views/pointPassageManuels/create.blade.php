@extends('template')
@section('title')
Rapport TGMS-GATE \TOGO
@endsection
@section('style-css')
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/select2/select2.min.css')}}">

@endsection

@section('header-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Point Passage Manuel
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active"> Point Passage Manuel </li>
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
                <a href="{{route('point-passage-manuel.index')}}"  class="btn btn-primary">Retour vers la liste</a>

                </div>
        </div>
        <h4 class="element-header"> PASSAGES EN MODE MANUEL</h4>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                @include('partials.notification')
            </div>
        </div>

        <div class="card">
            <div class="card-header">

            </div>

            <div class="card-body">
                <form action="{{route('point-passage-manuel.store')}}" method="post" class="form">

                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">

                            <label for="">Date</label>
                            <input type="date" name="date" class="form-control" >
                        </div>



                        <div class="col-lg-6 col-md-6">

                            <label for="">Voie</label>
                            <select class="form-control"  name="voie_id" id="voie_id">

                                @foreach ($voies as $v)
                            <option value="{{$v->id}}">{{$v->libelle}}</option>

                                @endforeach
                            </select>

                        </div>

                        <div class="col-lg-6 col-md-6">

                            <label for="">Vacation </label>
                            <select name="vacation" id="vacation" class="form-control">


                                <option value="{{ env('TYPE_VACATION_06H')}}">{{ env('TYPE_VACATION_06H')}}</option>
                            <option value="{{ env('TYPE_VACATION_14H')}}">{{ env('TYPE_VACATION_14H')}}</option>
                            <option value="{{ env('TYPE_VACATION_20H')}}">{{ env('TYPE_VACATION_20H')}}</option>

                            </select>

                        </div>

                        <div class="col-lg-6 col-md-6">

                            <label for="">Percepteur</label>

                            <select name="identite_percepteur" id="identite_percepteurS" class="form-control">
                                @foreach ($agents as $agent)
                                <option value="{{ $agent->nom }}">{{ $agent->nom }}</option>

                                @endforeach
                            </select>
                        </div>


                    </div>
                    <br>
                    <div class="row">

                        <div class="col-lg-12">
                            <h4>ETAT AVANT PASSAGE EN MODE MANUEL </h4>
                        </div>
                        <div class="col-lg-6 col-md-6">

                            <label for="">Point trafic informatisé avant démarrage du mode manuel </label>
                            <input type="number" name="point_traf_info_mode_manuel" class="form-control" required>
                        </div>


                        <div class="col-lg-6 col-md-6">

                            <label for="">Solde recette informatisée avant démarrage du mode manuel</label>
                            <input type="number" name="solde_recette_info_mode_manuel" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">

                            <label for="">Heure de debut (comptage manuel) </label>
                            <input type="time" name="heure_debutComptage" class="form-control" >
                        </div>

                        <div class="col-lg-6 col-md-6">

                            <label for="">Heure de fin (comptage manuel)</label>
                            <input type="time" name="heure_finComptage" class="form-control" >
                        </div>
                    </div>
                    <br>

                    <div class="row">

                        <div class="col-lg-12">
                        <h4>RESULTAT ISSU DU COMPTAGE MANUEL </h4>

                        </div>
                        <div class="col-lg-6 col-md-6">

                            <label for="">Trafic compté manuellement</label>
                            <input type="number"  class="form-control" name="trafic_compteManu" id="trafic_compteManu" required>
                        </div>

                        <div class="col-lg-6 col-md-6">

                            <label for="">Equivalent recette en FCFA</label>
                            <input type="number" class="form-control" name="equipRecette" id="equipRecette" required>

                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <h4>ETAT DONNEES INFORMATISEES ENREGISTREES APRES PASSAGES EN MODE MANUEL</h4>
                        <div class="col-lg-6 col-md-6">

                            <label for="">Etat données du trafic informatiser</label>
                            <input type="number" class="form-control" name="etaDonne_taficInformatiser" id="etaDonne_taficInformatiser" required>

                        </div>

                        <div class="col-lg-6 col-md-6">

                            <label for="">Etat données de recette informatiser</label>
                            <input type="number" class="form-control" name="etaDonne_recetteInformatiser" id="etaDonne_recetteInformatiser" required>

                        </div>
                    </div>


                    <br>

                    <div class="row">

                        <div class="col-md-12">

                            <label for="">Observation</label>
                            <textarea class="form-control" name="observation" id="observation" cols="30" rows="10"></textarea>
                        </div>




                    </div>

                        <br>
                        <fieldset>

                </form >

            <br>


            <br>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="Enregistrer" class="btn btn-success">

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
