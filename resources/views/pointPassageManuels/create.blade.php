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
                <a href="{{route('point-passage.index')}}"  class="btn btn-primary">Retour vers la liste</a>

                </div>
        </div>
        <h4 class="element-header">POINT JOURNALIER DES PASSAGES _ PREPAIEMENT</h4>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                @include('partials.notification')
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="form-header">Ajouter un point journalier passage</h5>

            </div>

            <div class="card-body">
                <form action="{{route('point-passage.store')}}" method="post" class="form">

                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">

                            <label for="">Date</label>
                            <input type="date" name="date" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Voie</label>
                            <select class="form-control"  name="voie_id" id="voie_id">

                                @foreach ($voies as $v)
                            <option value="{{$v->id}}">{{$v->libelle}}</option>

                                @endforeach
                            </select>
                        
                        </div>
                        <div class="col-lg-4 col-md-4">

                            <label for="">Site </label>
                            <select class="form-control"  name="site_id" id="site_id">

                                @foreach ($sites as $v)
                            <option value="{{$v->id}}">{{$v->libelle}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Vacation</label>
                            <input type="ENUM" name="vacation" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Identité percepteur</label>
                            <input type="VACHAR" name="identite_percepteur" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Point trafic informatisé avant démarrage du mode manel</label>
                            <input type="TEXT" name="point_traf_info_mode_manuel" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Solde recette informatisée avant démarrage du mode manuel</label>
                            <input type="INT" name="solde_recette_info_mode_manuel" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Heure de debut (comptage manuel) </label>
                            <input type="TiME" name="heure_debutComptage" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Heure de fin (comptage manuel)</label>
                            <input type="TIME" name="heure_finComptage" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Trafic compté manuellement</label>
                            <textarea class="form-control" name="trafic_compteManu" id="trafic_compteManu" cols="30" rows="10"></textarea>
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Equivalent recette en FCFA</label>
                            <textarea class="form-control" name="equipRecette" id="equipRecette" cols="30" rows="10"></textarea>
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Etat données du trafic informatiser</label>
                            <textarea class="form-control" name="etaDonne_taficInformatiser" id="etaDonne_taficInformatiser" cols="30" rows="10"></textarea>
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Etat données de recette informatiser</label>
                            <textarea class="form-control" name="etaDonne_recetteInformatiser" id="etaDonne_recetteInformatiser" cols="30" rows="10"></textarea>
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Etat final de recette informatiser</label>
                            <textarea class="form-control" name="etaFinal_recetteInformatiser" id="etaFinal_recetteInformatiser" cols="30" rows="10"></textarea>
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Etat final du trafic informatiser</label>
                            <textarea class="form-control" name="etaFinal_taficInformatiser" id="etaFinal_taficInformatiser" cols="30" rows="10"></textarea>
                        </div>

                        

                        
                    </div>
                    <br>

                    <div class="row">

                    <div class="col-lg-4 col-md-4">


                        <div class="col-md-12">

                                <label for="">Observation</label>
                            <textarea class="form-control" name="Observation" id="Observation" cols="30" rows="10"></textarea>
                        </div>

                       
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
