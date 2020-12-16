
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
              <li class="breadcrumb-item active">Point de passage</li>
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
                
                    <a href="{{route('point-passage.create')}}" class="btn btn-primary">Ajouter un point de journalier de passage </a>
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

                <h5 class="form-header">POINT JOURNALIER DES PASSAGES _ PREPAIEMENT</h5>


            </a><!-- /.card-header -->

            <div class="card-body">


                <div class="table-responsive">
                    <table id="example1" class="table  estdata table-bordered table-striped">
                        <thead>
                            <tr>
                                <th data-target="date">DATE</th>
                                <th data-target="site">SITE</th>
                                <th data-target="voie">VOIE</th>
                                <th >TRAFIC PAR VACATION  08H à 16H</th>
                                <th >TRAFIC PAR VACATION  16H à 22H</th>
                                <th >TRAFIC PAR VACATION  22H à 08H08H à 16H</th>

                                <th> PASSAGE  ONLINE</th>
                                <th> PASSAGE  OFFLINE</th>

                                <th>SOMME TOTAL TRAFIC</th>
                                <th>SOMME TOTAL RECETTE EQUIVALENTE</th>
                                
                                <th>CAS DE PAIEMENT ESPECE SUITE A UN  DYSFONCTIONNEMENT</th>
                                <th>CAS DE PAIEMENT ESPECE _ DEFAUT DE PROVISION</th>
                                <th>Observations</th>
                                <th>Enregister Par</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th data-target="date">DATE</th>
                                <th data-target="site">SITE</th>
                                <th data-target="voie">VOIE</th>
                                <th >TRAFIC PAR VACATION  08H à 16H</th>
                                <th >TRAFIC PAR VACATION  16H à 22H</th>
                                <th >TRAFIC PAR VACATION  22H à 08H08H à 16H</th>

                                <th> PASSAGE  ONLINE</th>
                                <th> PASSAGE  OFFLINE</th>

                                <th>SOMME TOTAL TRAFIC</th>
                                <th>SOMME TOTAL RECETTE EQUIVALENTE</th>
                                
                                <th>CAS DE PAIEMENT ESPECE SUITE A UN  DYSFONCTIONNEMENT</th>
                                <th>CAS DE PAIEMENT ESPECE _ DEFAUT DE PROVISION</th>
                                <th>Observations</th>
                                <th>Enregister Par</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                            @foreach ($pointPassages as $point)
                                
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

