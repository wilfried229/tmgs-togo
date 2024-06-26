<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-l mt-3 pb-3 mb-3 d-flex">

        <div class="info">
            <a href="#" class="d-block">
                <i class="fa fa-circle text-success"> </i>
                @if (Auth::user())

                {{Auth::user()->name}}
             @endif
            </a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">


        <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fa fa-list"></i>
                    <p>
                        Menus
                    </p>
                </a>

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fa fa-home"></i>
                    <p>Accueil</p>
                </a>
            </li>
            @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','SAFER']))

            <li class="nav-item has-treeview">


                <a href="#" class="nav-link">
                    <p>
                    <i class="fa fa-angle-left right"></i>

                    Statistiques
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a
                    href="{{route('statistique-recette.view')}}"
                  class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p> Recettes</p>
                    </a>

                  </li>

                  <li class="nav-item">
                    <a
                    href="{{route('statistique-trafics.view')}}"
                  class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p> Trafics</p>
                    </a>

                  </li>

                  <li class="nav-item">
                    <a href="{{ route('statistique-passage-gate.view') }}" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Passage Gate</p>
                    </a>
                  </li>
                  
                </ul>
              </li>

            @endif

            <li class="nav-item">
                <a
                @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','SAFER']))
                href="{{route('recettes.trafics.site')}}"
                @else
                href="{{route('recettes-trafics.index')}}"
                @endif
              class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Recettes/Trafics</p>
                </a>
            </li>
            <li class="nav-item">
                <a
                @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','SAFER']))

                href="{{route('passage.gate.site')}}"
                @else
                href="{{route('point-passage.index')}}"
                @endif
                 class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Point de passage GATE</p>
                </a>
            </li>


            <li class="nav-item">
                <a
                @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','SAFER']))
                href="{{route('passage.uhf.site')}}"
                @else
                href="{{route('point-passage-uhf.index')}}"
                @endif
                class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Point de passage UHF</p>
                </a>
            </li>

            <li class="nav-item">
                <a
                @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','SAFER']))
                href="{{route('passage.manuel.site')}}"
                @else
                href="{{route('point-passage-manuel.index')}}"
                @endif
               class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Point de passage Manuel</p>
                </a>
            </li>


            @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','PERCEPTEUR']))
            <li class="nav-item">
                <a
                @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','SAFER']))
                href="{{route('dysfonct.site')}}"
                @else
                href="{{route('dysfonctionement.index')}}"
                @endif
                class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>DYSFONCTIONNEMENT</p>
                </a>
            </li>
            <li class="nav-item">
                <a
                @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN','SAFER']))
                    href="{{route('compt.site')}}"
                @else
                href="{{route('comptage.index')}}"
                @endif
              class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>COMPATGE CONTRADITOIRE</p>
                </a>
            </li>


           {{--  <li class="nav-item">
                <a href="{{route('point-recap.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-list"></i>
                    <p>POINT RECPITULATIF DES MODES DE PAIEMENT</p>
                </a>
            </li>
 --}}
            @endif



            @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))
            <li class="nav-item">
                <a href="{{route('site.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Site</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('voie.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Voie</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('agent.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Agent</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{route('file-export.all')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Export DATA</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('import')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Import DATA</p>
                </a>
            </li>


                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fa fa-user"></i>
                        <p>Mon Profile </p>
                    </a>

                </li>

            @endif
            @if (in_array(Auth::user()->role,['SUPERADMIN']))
            <li class="nav-item">
                <a href="{{route('file-export.all')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Export DATA</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('import')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Import DATA</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="fa fa-users"></i>
                    <p>Utilisateurs</p>
                </a>
            </li>
            @endif
                <li class="nav-item">

                    <a class="dropdown-item"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
