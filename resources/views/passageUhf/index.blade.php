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
              <li class="breadcrumb-item active">Point de passage UHF</li>
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

                    <a href="{{route('point-passage-uhf.create')}}" class="btn btn-primary">Ajouter un point de journalier de passage  UHF</a>
                </h6>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <h6 class="element-header">
                    </h6>
            </div>
        </div>
        <form class="mb-4" action="{{ route('passage.uhf.search') }}" method="POST">
            @csrf
            <div class="row">
                <!-- secteur d'activité -->
                <div class="form-group col-md-4">
                    <label for="date">Date</label>
                  <input type="date" name="date" id="date" class="form-control">
                </div>
                <!-- niveau etude -->
                <div class="form-group col-md-4">
                    <label for="site">Site</label>
                    <select name="site_id" id="site_id" class="form-control">
                        <option value="" selected>Selectionnez</option>

                        @foreach ($sites as $site)
                        <option value="{{ $site->id }}">{{ $site->libelle }}</option>

                        @endforeach
                    </select>
                </div>
                <!-- sexe -->
                <div class="form-group col-md-4">
                    <label for="">Voie</label>
                    <select name="voie_id" id="voie_id" class="form-control">
                        <option value="" selected>Selectionnez</option>

                        @foreach ($voies as $voie)
                        <option value="{{ $voie->id }}">{{ $voie->libelle }}</option>

                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <input class="btn btn-success" type="submit" value="Rechercher">
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
        <div class="card card-success">

            <a class="btn btn-block btn-success" href="#" style="font-size: 17px;" data-toggle="modal" data-target="#ENCOModal" data-whatever="@getbootstrap">

                <h5 class="form-header">POINT JOURNALIER DES PASSAGES  UHF</h5>


            </a><!-- /.card-header -->

            <div class="card-body">


                <div class="table-responsive">
                    <table id="example1" class="table  estdata table-bordered table-striped">
                        <thead>
                            <tr>
                                <tr>
                                    <th colspan="3"></th>
                                    <th colspan="3">TRAFIC PAR VACATION</th>

                                    <th colspan="1"></th>
                                    <th colspan="2">SOMME TOTAL</th>
                                    <th colspan="3">INFORMATIONS DIVERSES </th>


                                    <th colspan="2"></th>
                                </tr>
                            </tr>
                            <tr>
                                <th data-target="date">DATE</th>
                                <th data-target="site">SITE</th>
                                <th data-target="voie">VOIE</th>
                                <th> 08H-16H</th>
                                <th> 16H-22H</th>
                                <th> 22H-08H</th>

                                <th>PASSAGE UHF</th>


                                <th>TRAFIC</th>
                                <th>RECETTE EQUIVALENTE</th>

                                <th>CAS DE PAIEMENT ESPECE SUITE A UN  DYSFONCTIONNEMENT</th>
                                <th>CAS DE PAIEMENT ESPECE _ DEFAUT DE PROVISION</th>
                                <th>Observations</th>
                                <th>Enregister Par</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($passageUhfs as $point)

                            <tr>
                                <td>{{ $point->date }}</td>
                                <td>{{ $point->voie()->first()->libelle }}</td>
                                <td>{{ $point->site()->first()->libelle }}</td>
                                <td>{{ $point->vacation_6h }}</td>
                                <td>{{ $point->vacation_14h }}</td>
                                <td>{{ $point->vacation_20h }}</td>
                                <td>{{ $point->passage_uhf }}</td>
                                <td>{{ $point->somme_total_trafic }}</td>
                                <td>{{ $point->somme_total_recette_equialente }}</td>
                                <td>{{ $point->paiement_espece_defaut_provision }}</td>
                                <td>{{ $point->paiement_espece_dysfon }}</td>
                                <td>{{ $point->observations }}</td>
                                <td>{{ $point->user()->first()->name ?? "" }}</td>

                                <td>
                                    @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))
                                    <a href="{{ route('point-passage.edit',$point->id) }}" class="btn btn-info">Modifier</a>
                                    @endif
                                </td>
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

        ],
        "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "lengthMenu": "Afficher _MENU_ données par Page",
                "zeroRecords": "Aucun résultat",
                "info": "Page _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucun  données trouvée",
                "infoFiltered": "(sur les _MAX_ données",
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

