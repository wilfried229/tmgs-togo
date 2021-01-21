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

                <div class="data-table-area mg-b-15">
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

                    @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))
                    <form class="mb-4" action="{{ route('recettes.trafics.search') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- secteur d'activité -->
                            <div class="form-group col-md-3">
                                <label for="date">Date de début</label>
                              <input type="date" name="date_debut" id="date" class="form-control">
                            </div>
                            <!-- niveau etude -->

                             <!-- secteur d'activité -->
                             <div class="form-group col-md-3">
                                <label for="date">Date de fin</label>
                              <input type="date" name="date_fin" id="date" class="form-control">
                            </div>
                            <!-- niveau etude -->
                            <!-- sexe -->
                            <div class="form-group col-md-6">
                                <label for="">Voie</label>
                                <select name="voie_id" id="voie_id" class="form-control">
                                    <option value="" selected>Selectionnez</option>

                                    @foreach ($voies as $voie)
                                    <option value="{{ $voie->id }}">{{ $voie->libelle }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <!-- age -->
                            <div class="form-group col-md-6">
                                <label for="">Vacation</label>

                                        <select name="vacation" id="vacation" class="form-control">
                                            <option value="" selected>Selectionnez</option>


                                                <option value="{{ env('TYPE_VACATION_06H')}}">{{ env('TYPE_VACATION_06H')}}</option>
                                            <option value="{{ env('TYPE_VACATION_14H')}}">{{ env('TYPE_VACATION_14H')}}</option>
                                            <option value="{{ env('TYPE_VACATION_20H')}}">{{ env('TYPE_VACATION_20H')}}</option>

                                        </select>
                            </div>
                            <!-- année d'experience -->
                            <div class="form-group col-md-6">
                                <label for="agent">Agent</label>
                                <select name="agent_voie" id="agent_voie" class="form-control">
                                    @foreach ($agents as $agent)
                                    <option value="{{ $agent->nom }}">{{ $agent->nom }}</option>

                                    @endforeach
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

                    @endif

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
                                            <tr>
                                                <th colspan="4"></th>
                                                <th colspan="5">Recetes</th>

                                                <th colspan="7">Trafic</th>

                                                @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))

                                                    <th colspan="3"></th>
                                                    @else
                                                    <th colspan="1"></th>

                                                @endif

                                                <th></th>
                                            </tr>
                                        </tr>
                                    <tr>
                                        <th data-target="date">Date</th>
                                        <th data-target="site">Site</th>
                                        <th data-target="voie">Voie</th>
                                        <th data-target="vacation">Vacation</th>
                                        <th data-target="agent">Agent</th>

                                        <th data-target="montant">Montant Coupon</th>

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

                                        @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))

                                            <th>Enregister Par</th>
                                            <th>Action</th>
                                        @endif


                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($recettes as $recette)


                                        <tr>
                                            <td>
                                                {{ Carbon\Carbon::parse($recette->date)->format('d/m/Y') }}
                                            </td>
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
                                            @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))
                                            <td>{{$recette->user()->first()->name ?? ""}}</td>
                                            <td>
                                                <a href="{{ route('recettes-trafics.edit',$recette->id) }}" class="btn btn-info">Modifier</a>

                                                @if ($recette->manquant > 0 )
                                                <a  onclick="event.preventDefault(); document.getElementById('payer-manquant-{{$recette->id}}').submit(); return false;"   class="btn btn-warning">Payer </a>
                                                <form id="payer-manquant-{{$recette->id}}" action="{{route('payement.manquant',$recette->id)}}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    @method('GET')
                                                </form>

                                                @endif
                                            </td>
                                            @endif


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

                </div>
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

