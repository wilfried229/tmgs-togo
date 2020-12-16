
@extends('template')
@section('title')
Rapport TGMS-GATE \TOGO
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
            <h1 class="m-0 text-dark">Rapport TGMS-GATE \TOGO
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Point de passage </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12">
           
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4">
                <h6 class="element-header">
                
                    <a href="{{route('point-passage.create')}}" class="btn btn-primary">Ajouter un point de passage manuel</a>
                </h6>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <h6 class="element-header">
                    </h6>
            </div>
        </div>
        <div class="card card-success">

            <a class="btn btn-block btn-success" href="#" style="font-size: 17px;" data-toggle="modal" data-target="#ENCOModal" data-whatever="@getbootstrap">

                <h5 class="form-header">Liste des points de passage Manuel </h5>


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
                                <th data-target="type_passage">Type Passage</th>

                                <th data-target="identite_percepteur">Identite percepteur</th>

                                <th data-target="point_traf_info_mode_manuel">Point de trafic informatisée en mode manuel Informatisée</th>
                                <th data-target="solde_recette_info_mode_manuel">Solde Recette informatisé Mode manuel</th>
                                <th>Heure Debut Comptage</th>
                                <th>Heure fin Comptage</th>
                                <th>Trafic CompteManu</th>
                                <th>Equipe Recette</th>
                                <th>Etat des Donnetafic Informatisé</th>
                                <th>Etat Donnes Recette Informatisé</th>
                                <th>Eta Final Recette Informatisé</th>
                                <th>Etat Final Trafic Informatisé</th>
                                <th>observations</th>
                                <th>Enregister Par</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th data-target="date">Date</th>
                                <th data-target="site">Site</th>
                                <th data-target="voie">Voie</th>
                                <th data-target="vacation">Vacation</th>
                                <th data-target="type_passage">Type Passage</th>

                                <th data-target="identite_percepteur">Identite percepteur</th>

                                <th data-target="point_traf_info_mode_manuel">Point de trafic informatisée en mode manuel Informatisée</th>
                                <th data-target="solde_recette_info_mode_manuel">Solde Recette informatisé Mode manuel</th>
                                <th>Heure Debut Comptage</th>
                                <th>Heure fin Comptage</th>
                                <th>Trafic CompteManu</th>
                                <th>Equipe Recette</th>
                                <th>Etat des Donnetafic Informatisé</th>
                                <th>Etat Donnes Recette Informatisé</th>
                                <th>Eta Final Recette Informatisé</th>
                                <th>Etat Final Trafic Informatisé</th>
                                <th>observations</th>
                                <th>Enregister Par</th>

                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pointPassageManuels as $f)

                            <tr>
                            

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
            <!-- /.card-body -->
        </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->


    </div>
<section>

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
          $('#example1').DataTable( {
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
                "infoPostFix":    "",
                "thousands":      ",",
                "loadingRecords": "Chargement...",
                "processing":     "Traitement...",
                "search":         "Rechercher : ",
                "paginate": {
                    "first":      "Premier",
                    "last":       "Dernier",
                    "next":       "Suivante",
                    "previous":   "Précedente"
                }
            },

    } );
        });
      </script>



@endsection

