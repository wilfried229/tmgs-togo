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
            <h1 class="m-0 text-dark">Rapport TGMS-GATE \TOGO
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Utilisateur</li>
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
            <a href="{{route('users.index')}}" class="btn btn-primary">Retour vers la liste</a>
            </div>
        </div>
        <h4 class="element-header"> Utilisateur</h4>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                @include('partials.notification')
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="form-header">Modification de  {{$user->name}} </h5>
            </div>
            <div class="card-body">
                <form action="{{route('users.update',$user->id)}}" method="post" class="form">
                    @csrf

                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12 col-md-4">
                            <label for="">Nom</label>
                        <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <label for=""> Email</label>

                        <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control">
                        </div>
                     </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-4">
                            <label for="">Role</label>


                            <select name="role" id="role" class="form-control">
                                <option value="ADMIN">ADMIN</option>
                                <option value="PERCEPTEUR">PERCEPTEUR</option>
                                <option value="SAFER">SAFER</option>

                            </select>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="">Site</label>

                            <select name="site_id" id="site_id" class="form-control">
                                @foreach ($sites as $site)
                                            <option value="{{ $site->id }}">{{ $site->libelle }}</option>

                                @endforeach
                             </select>
                        </div>

                        <div class="col-md-12">
                            <label for=""> Password</label>

                        <input type="password" name="password" id="password"  class="form-control">
                        </div>
                    </div>
                    <br>



            <div class="row">

                <div class="col-md-12">
                    <input type="submit" value="Modification" class="btn btn-success">

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

