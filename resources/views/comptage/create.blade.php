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
                <a href="{{route('comptage.index')}}"  class="btn btn-primary">Retour vers la liste</a>

                </div>
        </div>
        <h4 class="element-header"> COMPTAGE</h4>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                @include('partials.notification')
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="form-header">Ajouter un comptage contraditoire</h5>

            </div>

            <div class="card-body">
                <form action="{{route('comptage.store')}}" method="post" class="form" enctype="multipart/form-data">

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



                        <div class="col-lg-4 col-md-4">
                        <label for="">vacation</label>

                        <select name="vacation" id="vacation" class="form-control">


                            <option value="{{ env('TYPE_VACATION_06H')}}">{{ env('TYPE_VACATION_06H')}}</option>
                        <option value="{{ env('TYPE_VACATION_14H')}}">{{ env('TYPE_VACATION_14H')}}</option>
                        <option value="{{ env('TYPE_VACATION_20H')}}">{{ env('TYPE_VACATION_20H')}}</option>

                    </select>


                    </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">NOMBRE DE PASSAGE (MANUEL)</label>
                        <input type="number" name="nbre_passageManuel" id="nbre_passageManuel" class="form-control">

                        </div>

                        <div class="col-lg-4 col-md-4">
                        <label for="">NOMBRE DE PASSAGE (SYSTÈME)</label>
                        <input type="number" name="nbre_passageSysteme" id="nbre_passageSysteme" class="form-control">


                        </div>

                        <div class="col-lg-6 col-md-6">
                        <label for="">MONTANT MANUEL EN FCFA</label>
                        <input type="number" name="montantManuel" id="montantManuel" class="form-control">


                        </div>

                        <div class="col-lg-6 col-md-6">
                        <label for="">MONTANT INFORMATISÉ EN FCFA</label>
                        <input type="number" name="montantInformatiser" id="montantInformatiser" class="form-control">


                        </div>

                        <div class="col-lg-12 col-md-12">
                            <label for="Observations">Observations</label>
                            <textarea name="observation" id="observation" cols="30" rows="10" class="form-control" required></textarea>

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
