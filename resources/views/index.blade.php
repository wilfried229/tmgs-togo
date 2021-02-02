
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
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3></h3>

                      <p>Recettes/Trafics</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a

                    @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','SAFER']))

                    href="{{route('recettes.trafics.site')}}"
                    @else
                    href="{{route('recettes-trafics.index')}}"


                    @endif

                    class="small-box-footer">Cliquez ici <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3><sup style="font-size: 20px"></sup></h3>

                      <p>Passage GATE</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a
                    @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','SAFER']))

                    href="{{route('passage.gate.site')}}"
                    @else
                    href="{{route('point-passage.index')}}"


                      @endif
                    class="small-box-footer">Cliquez ici <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3></h3>

                      <p>Passage UHF</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a
                    @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','SAFER']))

                        href="{{route('passage.uhf.site')}}"
                        @else
                        href="{{route('point-passage-uhf.index')}}"


                        @endif
                        class="small-box-footer">Cliquez ici <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3></h3>

                      <p>Comptage Contraditoire</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a
                    @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','SAFER']))

                    href="{{route('compt.site')}}"
                @else
                href="{{route('comptage.index')}}"


                @endif class="small-box-footer">Cliquez ici <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
              <!-- Main row -->
              <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card bg-primary-gradient">
                    <div class="card-header no-border">
                      <h3 class="card-title">
                        <i class="fa fa-map-marker mr-1"></i>
                        Visitors
                      </h3>
                      <!-- card tools -->
                      <div class="card-tools">
                        <button type="button"
                                class="btn btn-primary btn-sm daterange"
                                data-toggle="tooltip"
                                title="Date range">
                          <i class="fa fa-calendar"></i>
                        </button>
                        <button type="button"
                                class="btn btn-primary btn-sm"
                                data-widget="collapse"
                                data-toggle="tooltip"
                                title="Collapse">
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                      <div id="world-map" style="height: 250px; width: 100%;"></div>
                    </div>
                    <!-- /.card-body-->
                    <div class="card-footer bg-transparent">
                      <div class="row">
                        <div class="col-4 text-center">
                          <div id="sparkline-1"></div>
                          <div class="text-white">Visitors</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-4 text-center">
                          <div id="sparkline-2"></div>
                          <div class="text-white">Online</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-4 text-center">
                          <div id="sparkline-3"></div>
                          <div class="text-white">Sales</div>
                        </div>
                        <!-- ./col -->
                      </div>
                      <!-- /.row -->
                    </div>
                  </div>



                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                  <!-- Map card -->

                  <!-- /.card -->


                  <!-- Calendar -->
                  <div class="card bg-success-gradient">
                    <div class="card-header no-border">

                      <h3 class="card-title">
                        <i class="fa fa-calendar"></i>
                        Calendar
                      </h3>
                      <!-- tools card -->
                      <div class="card-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars"></i></button>
                          <div class="dropdown-menu float-right" role="menu">
                            <a href="#" class="dropdown-item">Add new event</a>
                            <a href="#" class="dropdown-item">Clear events</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">View calendar</a>
                          </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
                          <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-widget="remove">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                      <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <!--The calendar -->
                      <div id="calendar" style="width: 100%"></div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </section>
                <!-- right col -->
              </div>
              <!-- /.row (main row) -->
              
            </div><!-- /.container-fluid -->
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


