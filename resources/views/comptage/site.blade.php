
@extends('template')
@section('title')
   Rapport togo
@endsection
@section('style-css')

    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables/dataTables.bootstrap4.css')}}">

@endsection()


@section('header-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                     Comptage
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Sites</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        @endsection
        @section('content')
        <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row">


                @foreach ($sites  as $site)
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3><sup style="font-size: 20px"></sup>{{ $site->libelle }}</h3>

                            <p></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('compt.list.site',$site->libelle) }}" class="small-box-footer">Cliquer ici <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endforeach

              </div>
              <!-- /.row -->

            </div><!-- /.container-fluid -->
          </section>
@endsection



@section('custmo-js')
            <script src="{{asset('AdminLTE/plugins/datatables/jquery.dataTables.js')}}"></script>
            <script src="{{asset('AdminLTE/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
@endsection


