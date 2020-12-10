
@extends('template-ide')
@section('title')
Idé-Log
@endsection
@section('style-css')

<link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables/dataTables.bootstrap4.css')}}">

@endsection
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
                <a href="{{route('demandeFormation.index')}}" class="btn btn-primary">Retour vers la liste</a>

                </div>
        </div>
        <h4 class="element-header">Demande Formation</h4>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                @include('partials.notification')
            </div>
        </div>

    <div class="card">

        <div class="card-header">
            <h5 class="form-header">Détail de la  Demande Formation N° {{$formation->id}} ({{$formation->agent->nom}} {{$formation->agent->prenom}})</h5>

        </div>
        <div class="card-body">
            <form action="#" method="post" class="form">


                <div class="row">


                    <div class="col-lg-6 col-md-4">

                        <label for="">Départements</label>

                        <select class="form-control" disabled name="departement_id" id="departement_id">

                            @foreach ($departements as $d)
                        <option value="{{$d->id}}" @if (old('departement_id',$d->id) == $formation->departement_id) selected

                              @endif>{{$d->libelle}}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="col-lg-6 col-md-4">

                        <label for="">Service</label>
                    <input type="text" disabled value="{{$formation->service}}"  name="service" id="service" class="form-control">

                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">

                        <label for="">Sollicite une formation sur le thème</label>
                        <textarea class="form-control" disabled  name="solicite_formation_theme" id="solicite_formation_theme" cols="30" rows="10">{{$formation->solicite_formation_theme}}</textarea>
                    </div>

                    <div class="col-md-12">

                            <label for="">Motivation</label>
                        <textarea class="form-control" disabled name="motivation" id="motivation" cols="30" rows="10">{{$formation->motivation}}</textarea>
                    </div>

                    <div class="col-md-12">

                        <label for="">Choix du formateur / de l'organisme de formation</label>
                    <textarea placeholder="" disabled   class="form-control" name="choix_formateur" id="choix_formateur" cols="30" rows="10">{{$formation->choix_formateur}}</textarea>
                </div>

                </div>

                    <br>
                    <fieldset>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <label for="">Localication</label>
                        <input type="text" name="localisation" value="{{$formation->localisation}}" class="form-control"  disabled id="localisation" >


                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label for="">Adresse</label>
                        <input type="text" disabled value="{{$formation->adresse}}" name="adresse" id="adresse" class="form-control">


                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label for="">Téléphone</label>
                        <input type="text" disabled value="{{$formation->tel}}" name="tel" id="tel" class="form-control">


                    </div>

                </div>

                    </fieldset>

                <br>
                <h6>Personne référente :</h6>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <label for="">Nom /Prénom</label>
                        <input type="text" disabled value="{{$formation->nom_personne_referente}}" name="nom_personne_referente" id="nom_personne_referente" class="form-control">

                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label for="">Téléphone </label>
                        <input type="tel" disabled value="{{$formation->tel_personne_referente}}" name="tel_personne_referente" id="tel_personne_referente" class="form-control">


                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label for="">Email</label>
                        <input type="text" disabled value="{{$formation->email_personne_referente}}"name="email_personne_referente" id="email_personne_referente" class="form-control">

                    </div>


                </div>
                <br>

                <br>
                <div class="row">

                    <div class="col-md-12">
                        <label for="">Mode avion: Frais de déplacement(Aller/Retour)</label>
                        <input type="number" disabled value="{{$formation->mode_avion}}" class="form-control" name="mode_avion" id="mode_avion">
                    </div>
                </div>



            <h6>Frais annexes</h6>

                    <fieldset>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">

                                <label for="">Logement</label>
                                <input type="text" disabled value="{{$formation->logoment}}" name="logoment" id="logoment" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-4">

                                <label for="">Restauration</label>
                                <input type="tel" disabled value="{{$formation->restauration}}"  name="restauration" id="restauration" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-4">

                                <label for="">Déplacement</label>
                                <input type="text" disabled value="{{$formation->deplacement}}"  name="deplacement" id="deplacement" class="form-control">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">

                                <label for="">Logement (Devise)</label>
                                <input type="text" disabled value="{{$formation->logoment_devise}}" name="logoment_devise" id="logoment_devise" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-4">

                                <label for="">Restauration (Devise)</label>
                                <input type="tel" disabled value="{{$formation->restauration_devise}}"  name="restauration_devise" id="restauration_devise" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-4">

                                <label for="">Déplacement (Devise)</label>
                                <input type="text" disabled value="{{$formation->deplacement_devise}}" name="deplacement_devise" id="deplacement_devise" class="form-control">
                            </div>

                        </div>
                    </fieldset>


                    <br>
                    <div class="row">

                        <div class="col-md-12">

                            <a href="{{route('formation.print',$formation->id)}}" class="btn btn-info">Imprimer</a>
                        </div>
                    </div>
                </form>

        </div>
    </div>
    </div>

</section>
@endsection
