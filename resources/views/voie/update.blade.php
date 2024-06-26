@extends('template')
@section('title')
TGMS-GATE
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
            <h1 class="m-0 text-dark">TGMS-GATE
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active"> Voie</li>
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
                <a href="{{route('voie.index')}}" class="btn btn-primary">Retour vers la liste</a>

                </div>
        </div>
        <h4 class="element-header">Voie</h4>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                @include('partials.notification')
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="form-header">Modification de la voie N° {{$voie->id}}</h5>

            </div>
            <form action="{{route('voie.update',$voie->id)}}" method="post" class="form">

                @csrf
                @method('PUT')
            <div class="row">
              <div class="col-md-6">
                                        <label for="">Voie</label>

                  <input type="text" name="libelle" value="{{ $voie->libelle }}" class="form-control">

              </div>

                <div class="col-lg-6 col-md-6">

                                        <label for="">Site</label>
                                        <select name="site_id" id="site_id" class="form-control" required>
                                            @foreach ($sites as $site)
                                            <option value="{{ $site->id }}" @if ($site->id == $voie->site_id)
                                                  selected                                              
                                            @endif>{{ $site->libelle }}</option>

                                            @endforeach
                                        </select>
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
