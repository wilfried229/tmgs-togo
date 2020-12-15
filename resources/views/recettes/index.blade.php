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
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Recettes\ Trafics</li>
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
                        <div class="col-md-4">
                            <h6 class="element-header">

                            </h6>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <h6 class="element-header">

                                <a class="btn btn-info" href="{{route('recettes-trafics.create')}}"> Ajouter une Recette</a>
                            </h6>
                        </div>
                    </div>

                    <div class="card card-success">

                        <a class="btn btn-block btn-success" href="#" style="font-size: 17px;" data-toggle="modal"
                           data-target="#ENCOModal" data-whatever="@getbootstrap">


                            <h3>Liste des Recettes</h3>

                        </a><!-- /.card-header -->

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example1" class="table  estdata table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-target="date">Date</th>
                                        <th data-target="site">Site</th>
                                        <th data-target="voie">Voie</th>
                                        <th data-target="vacation">Vacation</th>
                                        <th data-target="agent">Agent</th>

                                        <th data-target="montant">Montant</th>

                                        <th data-target="recette_information">Recette Informatisée</th>
                                        <th data-target="recette_declarer">Recette déclarée</th>
                                        <th>Manquant</th>
                                        <th>Suplus</th>
                                        <th>Vl</th>
                                        <th>Mini bus</th>
                                        <th>Autocars camion</th>
                                        <th>Pl</th>
                                        <th>Nombre exempté</th>
                                        <th>Violation</th>
                                        <th>Total</th>
                                        <th>Observation</th>
                                        <th>Enregister Par</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Site</th>
                                        <th>Voie</th>
                                        <th>Vacation</th>
                                        <th>Agent</th>

                                        <th>Montant</th>

                                        <th>Recette Informatisée</th>
                                        <th>Recette déclarée</th>
                                        <th>Manquant</th>
                                        <th>Suplus</th>
                                        <th>Vl</th>
                                        <th>Mini bus</th>
                                        <th>Autocars camion</th>
                                        <th>Pl</th>
                                        <th>Nombre exempté</th>
                                        <th>Violation</th>
                                        <th>Total</th>
                                        <th>Observation</th>
                                        <th>Enregister Par</th>
                                        <th>Action</th>

                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($recettes as $recette)


                                        <tr>
                                            <td>{{$recette->date}}</td>
                                            <td>{{$recette->site()->first()->libelle}}</td>
                                            <td>{{$recette->voie()->first()->libelle}}</td>
                                            <td>{{$recette->vacation}}</td>
                                            <td>{{$recette->agent_voie}}</td>
                                            <td>{{$recette->montant}}</td>
                                            <td>{{$recette->recette_informatiser}}</td>
                                            <td>{{$recette->recette_declarer}}</td>
                                            <td>{{$recette->manquant}}</td>
                                            <td>{{$recette->supplus}}</td>
                                            <td>{{$recette->vl}}</td>
                                            <td>{{$recette->mini_bus}}</td>
                                            <td>{{$recette->autocars_camion}}</td>
                                            <td>{{$recette->pl}}</td>
                                            <td>{{$recette->nbre_exempte}}</td>
                                            <td>{{$recette->violation}}</td>
                                            <td>{{$recette->total}}</td>
                                            <td>{{$recette->observation}}</td>
                                            <td>{{$recette->user()->first()->name}}</td>
<th></th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

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
            <script src="{{asset('AdminLTE/plugins/datatables/jquery.dataTables.js')}}"></script>
            <script src="{{asset('AdminLTE/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
            <!-- SlimScroll -->
            <script src="{{ asset('AdminLTE/dist/js/abonners.js')}}"></script>


            <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

            <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>


            <script>
                $('#flash-overlay-modal').modal();
            </script>

            <script>
                $(function () {
                    $('#example1').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ],
                        "paging": true,
                        "lengthChange": true,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": true,
                        "language": {
                            "lengthMenu": "Afficher _MENU_ abonnés par Page",
                            "zeroRecords": "Aucun résultat",
                            "info": "Page _PAGE_ sur _PAGES_",
                            "infoEmpty": "Aucun  abonnés trouvée",
                            "infoFiltered": "(sur les _MAX_ abonnés",
                            "infoPostFix": "",
                            "thousands": ",",
                            "loadingRecords": "Chargement...",
                            "processing": "Traitement...",
                            "search": "Rechercher : ",
                            "paginate": {
                                "first": "Premier",
                                "last": "Dernier",
                                "next": "Suivante",
                                "previous": "Précedente"
                            }
                        },

                    });
                });
            </script>
@endsection

