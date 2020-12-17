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
            <h1 class="m-0 text-dark">DYSFONCTIONNEMENT
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active"> DYSFONCTIONNEMENT </li>
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
                <a href="{{route('dysfonctionement.index')}}"  class="btn btn-primary">Retour vers la liste</a>

                </div>
        </div>
        <h4 class="element-header"> MODIFICATION DYSFONCTIONNEMENT</h4>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                @include('partials.notification')
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="form-header">Modification dysfonctionnement {{ $dysfonctionnment->id }}</h5>

            </div>

            <div class="card-body">
                <form action="{{route('comptage.update',$dysfonctionnment->id)}}" method="post" class="form" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <label for="">Date</label>
                            <input type="date" name="date" value="{{ $dysfonctionnment->date }}" class="form-control" >
                        </div>


                        <div class="col-lg-6 col-md-6">

                            <label for="">Site</label>

                            <select class="form-control"  name="site_id" id="site_id">

                                @foreach ($sites as $s)


                                <option value="{{$s->id}}"  @if ($s->id == $dysfonctionnment->site_id )
                                    selected
                                    @endif >{{$s->libelle}}</option>

                                @endforeach
                            </select>

                        </div>

                    </div>
                    <br>

                    <div class="row">



                        <div class="col-lg-4 col-md-4">
                        <label for="">Localisation</label>
                        <textarea name="localisation"  id="localisation" class="form-control" cols="30" rows="10" required>{{ $dysfonctionnment->localisation}}</textarea>
                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Dysfonctionnement</label>
                        <textarea name="dysfonctionnement"  id="dysfonctionnement" class="form-control" cols="30" rows="10" required>{{ $dysfonctionnment->dysfonctionnement }}</textarea>

                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Cause</label>
                        <textarea name="cause"  id="cause" class="form-control" cols="30" rows="10" required>{{ $dysfonctionnment->cause }}</textarea>

                        </div>

                        <div class="col-lg-6 col-md-6">
                        <label for="">Travaux a réaliser</label>
                        <textarea name="travauxArealiser"  id="travauxArealiser" class="form-control" cols="30" rows="10" required>{{ $dysfonctionnment->travauxArealiser }}</textarea>

                        </div>

                        <div class="col-lg-6 col-md-6">
                        <label for="">Travaux réaliser</label>
                        <textarea name="travauxRealiser"  id="travauxArealiser" class="form-control" cols="30" rows="10" required>{{ $dysfonctionnment->travauxArealiser }}</textarea>

                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Heure de constat</label>
                        <input type="time" name="heureConstat" value="{{ $dysfonctionnment->heureConstat }}" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Heure début d'intervention</label>
                        <input type="time" name="heureDebutIntervention" value="{{ $dysfonctionnment->heureDebutIntervention }}" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Heure fin d'intervention</label>
                        <input type="time" name="heureFinIntervention" value="{{ $dysfonctionnment->heureFinIntervention }}" class="form-control" >
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <label for="">Résultat obtenu </label>
                            <textarea name="resultatObtenir" id="resultatObtenir" cols="30" rows="10" class="form-control" required>{{ $dysfonctionnment->resultatObtenir }}</textarea>

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label for="">Besoins </label>
                            <textarea name="besoins" id="besoins" cols="30" rows="10" class="form-control" required>{{ $dysfonctionnment->besoins }}</textarea>

                        </div>

                        <div class="col-lg-6 col-md-6">
                            <label for="">PREUVE   (N° DE FICHE D'INTERVENTION, image avant ) </label>
                            <img  height="100" src="{{asset('preuve'). '/'. $dysfonctionnment->preuve_avant}}" alt="">


                            <input type="file" name="preuve_avant" id="preuve_avant" style="display: none"  class="form-control" required>

                            <label for="preuve_avant" class="btn btn-info">CLIQUER POUR CHANGER LA PEUVRE AVANT</label>
                            <br>

                            <label for="">PREUVE   (N° DE FICHE D'INTERVENTION, image après ) </label>

                            <img height="100" src="{{asset('preuve'). '/'. $dysfonctionnment->preuve_apres}}" alt="">

                            <input type="file" style="display: none" name="preuve_apres" id="preuve_apres" class="form-control" required>
                            <label for="preuve_apres" class="btn btn-info">CLIQUER POUR CHANGER LA PEUVRE APRES</label>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label for="Observations">Observations</label>
                            <textarea name="observation" id="observation" cols="30" rows="10" class="form-control" required>{{ $dysfonctionnment->observation }}</textarea>

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
