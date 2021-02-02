
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
              <li class="breadcrumb-item active"> DYSFONCTIONNEMENTS</li>
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

                    <a href="{{route('dysfonctionement.create')}}" class="btn btn-primary">Ajouter un dysfonctionnement </a>
                </h6>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <h6 class="element-header">
                    </h6>
            </div>

            <div class="col-lg-12">
                @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))

                <form class="mb-4" action="{{ route('dysfonction.search') }}" method="POST">

                    @csrf
                    <div class="row">
                        <!-- secteur d'activité -->
                        <div class="form-group col-md-6">
                            <label for="date">Date de début</label>
                          <input type="date" name="date_debut" id="date_debut" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="date">Date De fin</label>
                          <input type="date" name="date_fin" id="date_fin" class="form-control">
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

                @endif
            </div>
        </div>
        <div class="card card-success fixedRight">

            <a class="btn btn-block btn-success" href="#" style="font-size: 17px;" data-toggle="modal" data-target="#ENCOModal" data-whatever="@getbootstrap">

                <h5 class="form-header"> DYSFONCTIONNEMENTS</h5>


            </a><!-- /.card-header -->

            <div class="card-body">


                <div class="table-responsive">
                    <table id="example1" class="table  estdata table-bordered table-striped">
                        <thead>
                            <tr>
                                <th data-target="date">DATE</th>
                                <th data-target="site">Site</th>

                                <th data-target="LOCALISATION">LOCALISATION</th>
                                <th data-target="DYSFONCTIONNEMENT">DYSFONCTIONNEMENT</th>
                                <th >CAUSE DU DYSFONCTIONNEMENT</th>
                                <th >TRAVAUX À RÉALISER</th>
                                <th >TRAVAUX  RÉALISÉS</th>

                                <th> HEURE DE CONSTAT </th>
                                <th> HEURE DÉBUT D'INTERVENTION</th>

                                <th>HEURE FIN D'INTERVENTION</th>
                                <th>RÉSULTAT OBTENU</th>

                                <th>BESOINS</th>
                                <th>PREUVE (N° DE FICHE D'INTERVENTION, image avant et après </th>
                                <th>OBSERVATION</th>
                                @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))

                                <th>Enregister Par</th>
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($dysfonctionnments as $dysfon)

                            <tr>
                                <td>

                                    {{ Carbon\Carbon::parse($dysfon->date)->format('d/m/Y') }}

                                </td>
                                <td>{{ $dysfon->site()->first()->libelle }}</td>
                                <td>{{ $dysfon->localisation }}</td>
                                <td>{{ $dysfon->dysfonctionnement }}</td>
                                <td>{{ $dysfon->cause }}</td>
                                <td>{{ $dysfon->travauxArealiser }}</td>
                                <td>{{ $dysfon->travauxRealiser }}</td>
                                <td>{{ $dysfon->heureConstat }}</td>
                                <td>{{ $dysfon->heureDebutIntervention }}</td>
                                <td>{{ $dysfon->heureFinIntervention }}</td>
                                <td>{{ $dysfon->resultatObtenir }}</td>
                                <td>{{ $dysfon->besoins }}</td>

                                <td>
                                    <p>
                                        <img  height="100" src="{{asset('preuve'). '/'. $dysfon->preuve_avant}}" alt="{{'preuve avant '. $dysfon->preuve_avant}}">

                                        <img height="100" src="{{asset('preuve'). '/'. $dysfon->preuve_apres}}" alt="{{'preuve apres '. $dysfon->preuve_apres}}">
                                    </p>
                                </td>
                                <td>{{ $dysfon->observation  }}</td>
                                @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))

                                <td>{{ $dysfon->user()->first()->name ?? ""  }}</td>

                                <td>
                                    <a href="{{ route('dysfonctionement.edit',$dysfon->id) }}" class="btn btn-info">Modifier</a>

                                </td>
                                @endif
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
                "lengthMenu": "Afficher _MENU_ donnée par Page",
                "zeroRecords": "Aucun résultat",
                "info": "Page _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucune donnée trouvé",
                "infoFiltered": "(sur les _MAX_ donnée",
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

