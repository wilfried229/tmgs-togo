
@extends('template-ide')
@section('title')
Idé-Log
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
            <h1 class="m-0 text-dark">Idé-Log
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active"> Demande de formation</li>
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
            @include('partials.notification')
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4">
                <h6 class="element-header">
                    @if (in_array(Auth::user()->role,['ADMINISTRATEUR','RH','ARH']))

                    <a href="{{route('demandeFormation.create')}}" class="btn btn-primary">Ajouter une  demande de formation</a>

                @endif
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

                <h5 class="form-header">Liste des demandes de formation </h5>


            </a><!-- /.card-header -->

            <div class="card-body">


                <div class="table-responsive">
                    <table id="example1" class="table  estdata table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Fonction</th>
                                <th>Département</th>
                                <th>Service</th>
                                <th>ACCORD DU</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Fonction</th>
                                <th>Département</th>
                                <th>Service</th>
                                <th>ACCORD DU</th>
                                <th>Action</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($formations as $f)

                            <tr>
                                <td>{{$f->agent()->first()->nom}}</td>
                                <td>{{$f->agent()->first()->prenom}}</td>
                                <td>{{$f->agent()->first()->poste}}</td>
                                <td>{{$f->departement()->first()->libelle}}</td>

                                <td>{{$f->service}}</td>
                                <td>

                                    @foreach ($validationFormations as $vf)

                                    @if ($vf->demande_formation_id == $f->id)

                                        {{$vf->accorder}}

                                    @else



                                    @endif

                                    @endforeach
                                </td>

                                <td>

                                    <a href="{{route('demandeFormation.show',$f->id)}}" class="btn btn-warning">Détails</a>

                                    <br>


                                    @if (in_array(Auth::user()->role,['ADMINISTRATEUR','RH','ARH']))
                                    <a href="{{route('validation.formation',$f->id)}}"
                                        class="btn btn-success">Valider</a>

                                    @endif
                                <br>
                                <br>
                                @if (in_array(Auth::user()->role,['ADMINISTRATEUR','RH','ARH']))

                                <a href="{{route('demandeFormation.edit',$f->id)}}"  class="btn btn-info">Modifier </a>
                                <a  onclick="event.preventDefault(); document.getElementById('retirer-user-form-{{$f->id}}').submit(); return false;"   class="btn btn-danger">Supprimer </a>

                                <form id="retirer-user-form-{{$f->id}}" action="{{route('demandeFormation.destroy',$f->id)}}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                </form>
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

