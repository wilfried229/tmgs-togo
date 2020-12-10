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
            <a href="{{route('users.list')}}" class="btn btn-primary">Retour vers la liste</a>

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
                                <option value="AGENT" @if ($user->role == "AGENT")
                                    selected
                                @endif>AGENT</option>
                                <option value="ADMINISTRATEUR"@if ($user->role == "ADMINISTRATEUR")
                                    selected
                                @endif

                                >ADMINISTRATEUR</option>
                                <option value="RH"@if ($user->role == "RH")
                                    selected
                                @endif>RH</option>
                                <option value="ARH"@if ($user->role == "ARH")
                                    selected
                                @endif>ARH</option>

                                <option value="GAP"
                                @if ($user->role == "GAP")
                                    selected
                                @endif
                                >GAP</option>
                                <option value="GTP"
                                @if ($user->role == "GTP")
                                    selected
                                @endif>GTP</option>
                                <option value="DT"
                                @if ($user->role == "DT")
                                    selected
                                @endif>DT</option>
                                <option value="DAF"
                                @if ($user->role == "DAF")
                                    selected
                                @endif>DAF</option>
                            </select>
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

