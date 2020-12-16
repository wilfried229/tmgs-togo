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
            <h1 class="m-0 text-dark">Point Passage
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active"> Point Passage </li>
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

                            <label for="">Id</label>
                            <input type="BIGINT" name="date" class="form-control" >
                        </div>
                        <div class="col-lg-4 col-md-4">

                            <label for="">Voie</label>

                            <select class="form-control"  name="voie_id" id="voie_id">

                                @foreach ($voies as $s)

                            <option value="{{$s->id}}">{{$s->libelle}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-lg-4 col-md-4">

                            <label for="">Site</label>

                            <select class="form-control"  name="site_id" id="site_id">

                                @foreach ($sites as $v)
                            <option value="{{$v->id}}">{{$v->libelle}}</option>

                                @endforeach
                            </select>

                        </div>

                    </div>
                    <br>

                    <div class="row">


                        <div class="col-lg-4 col-md-4">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Localisation</label>
                        <input type="VARCHAR" name="localisation" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Dysfonctionnement</label>
                        <input type="VARCHAR" name="dysfonctionnement" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Cause</label>
                        <input type="VARCHAR" name="cause" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Travaux a réaliser</label>
                        <input type="VARCHAR" name="travauxArealiser" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Travaux réaliser</label>
                        <input type="VARCHAR" name="travauxRealiser" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Heure de constat</label>
                        <input type="TIME" name="heurConstat" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Heure début d'intervention</label>
                        <input type="time" name="heureDebutIntervention" class="form-control" >
                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">Heure fin d'intervention</label>
                        <input type="TIME" name="heureFinIntervention" class="form-control" >
                        </div>
                        
                        <div class="col-lg-12">

                            <label for="">Resultat obtenu </label>
                            <textarea name="observations" id="observations" cols="30" rows="10" class="form-control" required></textarea>

                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">

                            <label for="Observations">Observations</label>
                            <textarea name="observations" id="observations" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                    </div>

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
