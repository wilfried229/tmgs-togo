
@extends('template')
@section('title')
TGMS-GATE
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
                        <h1 class="m-0 text-dark">TGMS-GATE
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active"> Agent</li>
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
                            <a href="{{route('agent.index')}}"  class="btn btn-primary">Retour vers la liste</a>

                        </div>
                    </div>
                    <h4 class="element-header">Agent</h4>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12">
                    {{--      @include('partials.notification')--}}
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="form-header">Ajouter un Agent</h5>

                        </div>

                        <div class="card-body">
                            <form action="{{route('agent.store')}}" method="post" class="form">

                                @csrf

                                <div class="row">
                                    <div class="col-lg-4 col-md-4">

                                        <label for="">Nom</label>

                                        <input type="text" id="nom" name="nom" class="form-control" required>
                                    </div>
                                    <div class="col-lg-4 col-md-4">

                                        <label for="">Site</label>
                                        <select name="site_id" id="site_id" class="form-control" required>
                                            @foreach ($sites as $site)
                                            <option value="{{ $site->id }}">{{ $site->libelle }}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">

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
