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
                            <h3>Statistiques ({{ $site->libelle }}) Mois : {{ $periode }}</h3>
                        </a><!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    SEMAINE 1

                                    <canvas id="canvas" height="280" width="600"></canvas>

                                </div>
                                <div class="col-md-6">
                                    SEMAINE 2
                                    <canvas id="canvas2" height="280" width="600"></canvas>

                                </div>
                                <div class="col-md-6">
                                    SEMAINE 3
                                    <canvas id="canvas3" height="280" width="600"></canvas>

                                </div>
                                <div class="col-md-6">
                                    SEMAINE 4
                                    <canvas id="canvas4" height="280" width="600"></canvas>

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
     var voieSites = <?php echo $voieSites; ?>;

 var recetesVoiesWeek1 = <?php echo $recetesVoiesWeek1; ?>;
 var recetesVoiesWeek2 = <?php echo $recetesVoiesWeek2; ?>;
 var recetesVoiesWeek3 = <?php echo $recetesVoiesWeek3; ?>;
 var recetesVoiesWeek4 = <?php echo $recetesVoiesWeek4; ?>;


     var barChartData1 = {
         labels: voieSites,
         datasets: [{
             label: 'Voie',
             backgroundColor: "blue",
             data: recetesVoiesWeek1
         }]
     };

     var barChartData2 = {
         labels: voieSites,
         datasets: [{
             label: 'Voie',
             backgroundColor: "blue",
             data: recetesVoiesWeek2
         }]
     };
     var barChartData3 = {
         labels: voieSites,
         datasets: [{
             label: 'Voie',
             backgroundColor: "blue",
             data: recetesVoiesWeek3
         }]
     };

     var barChartData4 = {
         labels: voieSites,
         datasets: [{
             label: 'Voie',
             backgroundColor: "blue",
             data: recetesVoiesWeek4
         }]
     };

     window.onload = function() {
         var ctx = document.getElementById("canvas").getContext("2d");
         var ctx2 = document.getElementById("canvas2").getContext("2d");

         var ctx3 = document.getElementById("canvas3").getContext("2d");
         var ctx4 = document.getElementById("canvas4").getContext("2d");


         window.myBar = new Chart(ctx, {
             type: 'bar',
             data: barChartData1,
             options: {
                 elements: {
                     rectangle: {
                         borderWidth: 2,
                         borderColor: '#c1c1c1',
                         borderSkipped: 'bottom'
                     }
                 },
                 responsive: true,
                 title: {
                     display: true,
                     text: 'Recettes / Voie'
                 }
             }
         });

         window.myBar = new Chart(ctx2, {
             type: 'bar',
             data: barChartData2,
             options: {
                 elements: {
                     rectangle: {
                         borderWidth: 2,
                         borderColor: '#c1c1c1',
                         borderSkipped: 'bottom'
                     }
                 },
                 responsive: true,
                 title: {
                     display: true,
                     text: 'Recettes / Voie'
                 }
             }
         });
         window.myBar = new Chart(ctx3, {
             type: 'bar',
             data: barChartData3,
             options: {
                 elements: {
                     rectangle: {
                         borderWidth: 2,
                         borderColor: '#c1c1c1',
                         borderSkipped: 'bottom'
                     }
                 },
                 responsive: true,
                 title: {
                     display: true,
                     text: 'Recettes / Voie'
                 }
             }
         });
         window.myBar = new Chart(ctx4, {
             type: 'bar',
             data: barChartData4,
             options: {
                 elements: {
                     rectangle: {
                         borderWidth: 2,
                         borderColor: '#c1c1c1',
                         borderSkipped: 'bottom'
                     }
                 },
                 responsive: true,
                 title: {
                     display: true,
                     text: 'Recettes / Voie'
                 }
             }
         });
     };
 </script>
 @endsection


