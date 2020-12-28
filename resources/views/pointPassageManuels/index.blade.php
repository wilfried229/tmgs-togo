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

                <a href="{{route('point-passage-manuel.create')}}" class="btn btn-primary">Ajouter un point de passage manuel</a>
                </h6>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <h6 class="element-header">
                    </h6>
            </div>
        </div>
        <form class="mb-4" action="{{ route('passage.manuel.search') }}" method="POST">
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
               <div class="form-group col-md-6">
                     <label for="">Vacation</label>
                            <select name="vacation" id="vacation" class="form-control">

                                <option value="" selected>Selectionnez</option>

                                <option value="{{ env('TYPE_VACATION_06H')}}">{{ env('TYPE_VACATION_06H')}}</option>
                                <option value="{{ env('TYPE_VACATION_14H')}}">{{ env('TYPE_VACATION_14H')}}</option>
                                <option value="{{ env('TYPE_VACATION_20H')}}">{{ env('TYPE_VACATION_20H')}}</option>

                            </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Agent</label>
                        <input type="text" name="identite_percepteur" id="identite_percepteur" class="form-control">
               </div>

                <!-- pays residence -->
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

                <h5 class="form-header">Liste des points de passage Manuel </h5>


            </a><!-- /.card-header -->

            <div class="card-body">


                <div class="table-responsive">
                    <table id="example1" class="table  estdata table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="5"></th>
                                <th colspan="2">ETAT AVANT PASSAGE EN MODE MANUEL</th>
                                <th colspan="2">HEURE DE COMPTAGE</th>
                                <th colspan="2">RESULTAT ISSU DU COMPTAGE MANUEL </th>

                                <th colspan="2">ETAT DONNEES INFORMATISEES ENREGISTREES APRES PASSAGES EN MODE MANUEL</th>

                                <th colspan="2">ETAT FINAL DE LA VOIE POUR LA VACATION CONCERNEE </th>
                                <th colspan="3"> </th>
                            </tr>
                            <tr>
                                <th data-target="date">Date</th>
                                <th data-target="site">Site</th>
                                <th data-target="voie">Voie</th>
                                <th data-target="vacation">Vacation</th>

                                <th data-target="identite_percepteur">Identite percepteur</th>

                                <th data-target="point_traf_info_mode_manuel">Point de trafic informatisée en mode manuel Informatisée</th>
                                <th data-target="solde_recette_info_mode_manuel">Solde Recette informatisé Mode manuel</th>
                                <th> Debut </th>
                                <th> fin </th>
                                <th>Trafic compté manuellement</th>
                                <th>Equivalent recette en FCFA  </th>
                                <th>Trafic Informatisé </th>
                                <th>Recette Informatisée </th>
                                <th>Trafic (Informatisé + manuel)</th>
                                <th>Recette (Informatisé + manuel)</th>
                                <th>observations</th>
                                <th>Enregister Par</th>

                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pointPassageManuels as $f)

                            <tr>

                                <td>{{ $f->date }}</td>
                                <td>{{ $f->site()->first()->libelle }}</td>
                                <td>{{ $f->voie()->first()->libelle }}</td>
                                <td>{{ $f->vacation }}</td>
                                <td>{{ $f->identite_percepteur }}</td>
                                <td>{{ $f->point_traf_info_mode_manuel }}</td>
                                <td>{{ $f->solde_recette_info_mode_manuel }}</td>
                                <td>{{ $f->heure_debutComptage }}</td>
                                <td>{{ $f->heure_finComptage }}</td>
                                <td>{{ $f->trafic_compteManu }}</td>
                                <td>{{ $f->equipRecette }}</td>
                                <td>{{ $f->etaDonne_taficInformatiser }}</td>
                                <td>{{ $f->etaDonne_recetteInformatiser }}</td>
                                <td>{{ $f->etaFinal_recetteInformatiser }}</td>
                                <td>{{ $f->etaFinal_taficInformatiser }}</td>
                                <td>{{ $f->observation }}</td>
                                <td>{{ $f->user()->first()->name ?? "" }}</td>


                                <td>
                                    @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))
                                    <a href="{{ route('point-passage-manuel.edit',$f->id) }}" class="btn btn-info">Modifier</a>
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
                "lengthMenu": "Afficher _MENU_ point passage par Page",
                "zeroRecords": "Aucun résultat",
                "info": "Page _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucun données trouvée",
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

