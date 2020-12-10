<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Idé Log</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">

        <div class="col-md-4">
        <img src="{{asset('logo.jpeg')}}" width="100" alt="">

        </div>

        <div class="col-md-6">
            <h5>  Fiche de Demande Formation N° {{$formation->id}} ({{$formation->agent->nom}} {{$formation->agent->prenom}})</h5>


        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div class="card">

        <div class="card-body">
            <form action="#" method="post" class="form">


                <div class="row">


                    <div class="col-lg-6 col-md-6">

                        <label for="">Départements</label>

                        <select class="form-control" disabled name="departement_id" id="departement_id">

                            @foreach ($departements as $d)
                        <option value="{{$d->id}}" @if (old('departement_id',$d->id) == $formation->departement_id) selected

                              @endif>{{$d->libelle}}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="col-lg-6 col-md-6">

                        <label for="">Service</label>
                    <input type="text" disabled value="{{$formation->service}}"  name="service" id="service" class="form-control">

                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">

                        <label for="">Sollicite une formation sur le thème</label>
                        <textarea class="form-control" disabled  name="solicite_formation_theme" id="solicite_formation_theme" cols="30" rows="8">{{$formation->solicite_formation_theme}}</textarea>
                    </div>

                    <div class="col-md-12">

                            <label for="">Motivation</label>
                        <textarea class="form-control" disabled name="motivation" id="motivation" cols="30" rows="8">{{$formation->motivation}}</textarea>
                    </div>

                    <div class="col-md-12">

                        <label for="">Choix du formateur / de l'organisme de formation</label>
                    <textarea placeholder="" disabled   class="form-control" name="choix_formateur" id="choix_formateur" cols="30" rows="8">{{$formation->choix_formateur}}</textarea>
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

                </form>

        </div>
    </div>

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>

</html>
