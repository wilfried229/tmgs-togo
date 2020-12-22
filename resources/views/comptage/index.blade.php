
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
              <li class="breadcrumb-item active"> COMPTAGE</li>
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

                    <a href="{{route('comptage.create')}}" class="btn btn-primary">Ajouter un comptage </a>
                </h6>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <h6 class="element-header">
                    </h6>
            </div>

            <div class="col-lg-12">

                <form class="mb-4" action="{{ route('comptage.search') }}" method="POST">
                    
                    @csrf
                    <div class="row">
                        <!-- secteur d'activité -->
                        <div class="form-group col-md-3">
                            <label for="date">Date</label>
                          <input type="date" name="date" id="date" class="form-control">
                        </div>
                        <!-- niveau etude -->
                        <div class="form-group col-md-3">
                            <label for="site">Site</label>
                            <select name="site_id" id="site_id" class="form-control">
                                <option value="" selected>Selectionnez</option>

                                @foreach ($sites as $site)
                                <option value="{{ $site->id }}">{{ $site->libelle }}</option>

                                @endforeach
                            </select>
                        </div>
                        <!-- sexe -->
                        <div class="form-group col-md-3">
                            <label for="">Voie</label>
                            <select name="voie_id" id="voie_id" class="form-control">
                                <option value="" selected>Selectionnez</option>

                                @foreach ($voies as $voie)
                                <option value="{{ $voie->id }}">{{ $voie->libelle }}</option>

                                @endforeach
                            </select>
                        </div>
                       <div class="form-group col-md-3">
                             <label for="">Vacation</label>
                                    <select name="vacation" id="vacation" class="form-control">

                                        <option value="" selected>Selectionnez</option>

                                        <option value="{{ env('TYPE_VACATION_06H')}}">{{ env('TYPE_VACATION_06H')}}</option>
                                    <option value="{{ env('TYPE_VACATION_14H')}}">{{ env('TYPE_VACATION_14H')}}</option>
                                    <option value="{{ env('TYPE_VACATION_20H')}}">{{ env('TYPE_VACATION_20H')}}</option>

                                </select>
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
            </div>
        </div>
        <div class="card card-success">

            <a class="btn btn-block btn-success" href="#" style="font-size: 17px;" data-toggle="modal" data-target="#ENCOModal" data-whatever="@getbootstrap">

                <h5 class="form-header"> COMPTAGE</h5>


            </a><!-- /.card-header -->

            <div class="card-body">


                <div class="table-responsive">
                    <table id="example1" class="table  estdata table-bordered table-striped">
                        <thead>
                            <tr>
                                <th data-target="date">DATE</th>
                                <th data-target="site">Site</th>
                                <th data-target="voies">VOIES</th>
                                <th data-target="vacation">Vacation</th>

                                <th>NOMBRE DE PASSAGE (MANUEL)ISATION</th>
                                <th>NOMBRE DE PASSAGE (SYSTÈME)</th>
                                <th>MONTANT MANUEL EN FCFA</th>
                                <th>MONTANT INFORMATISÉ EN FCFA</th>
                                <th>OBSERVATIONS</th>
                                <th>Enregister Par</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($comptages as $comp)

                            <tr>
                                <td>{{ $comp->date }}</td>
                                <td>{{ $comp->site()->first()->libelle }}</td>
                                <td>{{ $comp->voie()->first()->libelle }}</td>
                                <td>{{ $comp->vacation }}</td>
                                <td>{{ $comp->nbre_passageManuel }}</td>
                                <td>{{ $comp->nbre_passageSysteme }}</td>
                                <td>{{ $comp->montantManuel }}</td>
                                <td>{{ $comp->montantInformatiser }}</td>
                                <td>{{ $comp->observation }}</td>
                                <td>{{ $comp->user()->first()->name ?? "" }}</td>

                                <td>
                                    @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))
                                    <a href="{{ route('comptage.edit',$comp->id) }}" class="btn btn-info">Modifier</a>
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

