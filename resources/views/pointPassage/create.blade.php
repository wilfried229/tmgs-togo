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

                            <label for="">Date</label>
                            <input type="date" name="date" class="form-control" >
                        </div>
                        <div class="col-lg-4 col-md-4">

                            <label for="">Sites</label>

                            <select class="form-control"  name="site_id" id="site_id">

                                @foreach ($sites as $s)
                            <option value="{{$s->id}}">{{$s->libelle}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-lg-4 col-md-4">

                            <label for="">Voie</label>

                            <select class="form-control"  name="voie_id" id="voie_id">

                                @foreach ($voies as $v)
                            <option value="{{$v->id}}">{{$v->libelle}}</option>

                                @endforeach
                            </select>

                        </div>

                    </div>
                    <br>

                    <div class="row">

                        <div class="col-lg-12">

                            <h4>TRAFIC PAR VACATION </h4>
                        </div>
                        <div class="col-lg-4 col-md-4">

                            <label for="">08H à 16H</label>
                            <input type="number" name="vacation_6h" id="vacation_6h" class="form-control" required>
                        </div>

                        <div class="col-lg-4 col-md-4">

                                <label for="">16H à 22H</label>
                            <input type="number" name="vacation_14h" id="vacation_14h" class="form-control" required>
                        </div>

                        <div class="col-lg-4 col-md-4">

                            <label for="">22H à 08H</label>
                            <input type="number" name="vacation_20h" id="vacation_20h" class="form-control" required>

                            </div>

                    </div>

                    <br>

                    <div class="row">

                        <div class="col-lg-12">

                            <h4>TYPE DE PASSAGE </h4>
                        </div>
                        <div class="col-lg-6 col-md-6">

                            <label for="">ONLINE </label>
                            <input type="number" name="type_passage_online" id="type_passage_online" class="form-control" required>
                        </div>

                        <div class="col-lg-6 col-md-6">

                                <label for="">OFFLINE   </label>
                            <input type="number" name="type_passage_offline" id="type_passage_offline" class="form-control" required>
                        </div>



                    </div>
                 <br>
                    <div class="row">

                        <div class="col-lg-12">

                            <h4>SOMMES TOTAL </h4>
                        </div>
                        <div class="col-lg-6 col-md-6">

                            <label for="">TRAFIC</label>
                            <input type="number" name="somme_total_trafic" id="somme_total_trafic" class="form-control" required>
                        </div>

                        <div class="col-lg-6 col-md-6">

                                <label for="">RECETTE EQUIVALENTE   </label>
                            <input type="number" name="somme_total_recette_equialente" id="somme_total_recette_equialente" class="form-control" required>
                        </div>

                    </div>

                    <br>
                    <div class="row">

                        <div class="col-lg-12">

                            <h4> INFORMATIONS DIVERSES </h4>
                        </div>
                        <div class="col-lg-6 col-md-6">

                            <label for="">CAS DE PAIEMENT ESPECE SUITE A UN  DYSFONCTIONNEMENT</label>
                            <input type="text" name="paiement_espece_defaut_provision" id="paiement_espece_defaut_provision" class="form-control" required>
                        </div>

                        <div class="col-lg-6 col-md-6">

                                <label for="">CAS DE PAIEMENT ESPECE _ DEFAUT DE PROVISION </label>
                            <input type="text" name="paiement_espece_dysfon" id="paiement_espece_dysfon" class="form-control" required>
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
