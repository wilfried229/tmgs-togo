
@extends('template-ide')
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
                <a href="{{route('demandeFormation.index')}}"  class="btn btn-primary">Retour vers la liste</a>

                </div>
        </div>
        <h4 class="element-header">Demande Formation</h4>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                @include('partials.notification')
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="form-header">Ajouter une Demande Formation</h5>

            </div>

            <div class="card-body">
                <form action="{{route('demandeFormation.store')}}" method="post" class="form">

                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">

                            <label for="">Agent /Personne</label>
                            <select class="form-control" name="agent_id" id="agent_id">

                                @foreach ($agents as $a)
                            <option value="{{$a->id}}">{{$a->nom }} {{$a->prenom}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">Départements</label>

                            <select class="form-control"  name="departement_id" id="departement_id">

                                @foreach ($departements as $d)
                            <option value="{{$d->id}}">{{$d->libelle}}</option>

                                @endforeach
                            </select>

                        </div>
                        <div class="col-lg-4 col-md-4">

                            <label for="">Service</label>
                            <input type="text" name="service" id="service" class="form-control">

                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">

                            <label for="">Sollicite une formation sur le thème</label>
                            <textarea class="form-control" name="solicite_formation_theme" id="solicite_formation_theme" cols="30" rows="10"></textarea>
                        </div>

                        <div class="col-md-12">

                                <label for="">Motivation</label>
                            <textarea class="form-control" name="motivation" id="motivation" cols="30" rows="10"></textarea>
                        </div>

                        <div class="col-md-12">

                            <label for="">Choix du formateur / de l'organisme de formation</label>
                        <textarea placeholder="--------------------------------
                                                 -----------------------------------------------------
                        "    class="form-control" name="choix_formateur" id="choix_formateur" cols="30" rows="10"></textarea>
                    </div>

                    </div>

                        <br>
                        <fieldset>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <label for="">Localication</label>
                            <select name="localisation" id="localisation" class="form-control">
                                <option value="Nationale">Nationale</option>
                                <option value="International">International</option>

                            </select>

                        </div>
                        <div class="col-lg-4 col-md-4">
                            <label for="">Adresse</label>
                            <input type="text" name="adresse" id="adresse" class="form-control">


                        </div>
                        <div class="col-lg-4 col-md-4">
                            <label for="">Téléphone</label>
                            <input type="text" name="tel" id="tel" class="form-control">


                        </div>

                    </div>

                        </fieldset>

                    <br>
                    <h6>Personne référente :</h6>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <label for="">Nom /Prénom</label>
                            <input type="text" name="nom_personne_referente" id="nom_personne_referente" class="form-control">

                        </div>
                        <div class="col-lg-4 col-md-4">
                            <label for="">Téléphone </label>
                            <input type="tel" name="tel_personne_referente" id="tel_personne_referente" class="form-control">


                        </div>
                        <div class="col-lg-4 col-md-4">
                            <label for="">Email</label>
                            <input type="text" name="email_personne_referente" id="email_personne_referente" class="form-control">

                        </div>


                    </div>
                    <br>

                    <br>
                    <div class="row">

                        <div class="col-md-12">
                            <label for="">Mode avion: Frais de déplacement(Aller/Retour)</label>
                            <input type="number" class="form-control" name="mode_avion" id="mode_avion">
                        </div>
                    </div>



                <h6>Frais annexes</h6>

            <fieldset>
                <div class="row">
                    <div class="col-lg-4 col-md-4">

                        <label for="">Logement</label>
                        <input type="text" name="logoment" id="logoment" class="form-control">
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <label for="">Restauration</label>
                        <input type="tel" name="restauration" id="restauration" class="form-control">
                    </div>

                    <div class="col-lg-4 col-md-4">

                        <label for="">Déplacement</label>
                        <input type="text" name="deplacement" id="deplacement" class="form-control">
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4 col-md-4">

                        <label for="">Logement (Devise)</label>
                        <input type="text" name="logoment_devise" id="logoment_devise" class="form-control">
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <label for="">Restauration (Devise)</label>
                        <input type="tel" name="restauration_devise" id="restauration_devise" class="form-control">
                    </div>

                    <div class="col-lg-4 col-md-4">

                        <label for="">Déplacement (Devise)</label>
                        <input type="text" name="deplacement_devise" id="deplacement_devise" class="form-control">
                    </div>

                </div>
            </fieldset>


            <br>
            <div class="row">

                <div class="col-md-12">
                    <label for="">Accord du</label>
                    <select  class="form-control select2 text text-info"  multiple name="accords[]" id="accords"  class="form-control" required>
                        <option value="RH">RH</option>
                        <option value="DG">DG</option>
                        <option value="DT">DT</option>
                        <option value="DAF">DAF</option>
                    </select>
                </div>
            </div>

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
