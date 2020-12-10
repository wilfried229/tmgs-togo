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
                            <li class="breadcrumb-item active">Utilisateur</li>
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
                                @if (in_array(Auth::user()->role,['ADMINISTRATEUR','RH']))

                                    <a href="{{route('users.create')}}" class="btn btn-primary">Ajouter un
                                        utilisateur </a>
                            </h6>

                            @endif

                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <h6 class="element-header">
                            </h6>
                        </div>
                    </div>

                    <div class="card card-success">

                        <a class="btn btn-block btn-success" href="#" style="font-size: 17px;" data-toggle="modal"
                           data-target="#ENCOModal" data-whatever="@getbootstrap">


                            <h3>Liste des Utilisateurs</h3>

                        </a><!-- /.card-header -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table  estdata table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nom Utilisateur</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Date de création</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Nom Utilisateur</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Date de création</th>

                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach ($users as $user)

                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <th>{{$user->role}}</th>
                                            <th>{{$user->created_at}}</th>

                                            <td>

                                                <br>
                                                @if (in_array(Auth::user()->role,['ADMINISTRATEUR','RH']))

                                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-info">Modifier </a>


                                                    <a onclick="event.preventDefault(); document.getElementById('retirer-user-form-{{$user->id}}').submit(); return false;"
                                                       class="btn btn-danger">Retirer </a>


                                                    <form id="retirer-user-form-{{$user->id}}"
                                                          action="{{route('users.deletes',$user->id)}}" method="POST"
                                                          style="display: none;">
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

