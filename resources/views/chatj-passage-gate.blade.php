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
                        <h1 class="m-0 text-dark">
                            TGMS-GATE
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active"></li>
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

                    <div class="card card-info">

                        <a class="btn btn-block btn-info" href="#" style="font-size: 17px;" data-toggle="modal"
                           data-target="#ENCOModal" data-whatever="@getbootstrap">
                            <h3>Statistiques Passage Gate ({{ $site->libelle }}) Mois : {{ $periode }}</h3>
                        </a><!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <canvas id="canvas" height="280" width="600"></canvas>
                                </div>

                            </div>


                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.row (main row) -->
                <!-- /.container-fluid -->


                <!--  modal ajout --->

            </section>
@endsection



 @section('custmo-js')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
 <script>
     var list = <?php echo $list; ?>;

 var sommeGate = <?php echo $sommeGate; ?>;

     var barChartData1 = {
         labels: list,
         datasets: [{
             label: 'Jour',
             backgroundColor: "green",
             data: sommeGate
         }]
     };


     window.onload = function() {
         var ctx = document.getElementById("canvas").getContext("2d");


         window.myBar = new Chart(ctx, {
             type: 'bar',
             data: barChartData1,
             options: {
                 elements: {
                     rectangle: {
                         borderWidth: 2,
                         borderColor: '#358533',
                         borderSkipped: 'bottom'
                     }
                 },
                 responsive: true,
                 title: {
                     display: true,
                     text: 'Somme Passage Gate/ Site'
                 }
             }
         });



     };
 </script>
 @endsection


