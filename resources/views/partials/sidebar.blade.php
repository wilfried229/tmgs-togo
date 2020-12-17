<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-l mt-3 pb-3 mb-3 d-flex">

        <div class="info">
            <a href="#" class="d-block">
                <i class="fa fa-circle text-success"> </i>
                {{--@if (Auth::user())

                {{Auth::user()->name}}
                @endif--}}
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
                <a href="" class="nav-link">
                    <i class="fa fa-home"></i>
                    <p>Accueil</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{route('recettes-trafics.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Recettes/Tracifs</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('dysfonctionement.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>DYSFONCTIONNEMENT</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('comptage.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>COMPATGE CONTRADITOIRE</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{route('point-passage.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Point de passage</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('point-passage-manuel.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>Point de passage Manuel</p>
                </a>
            </li>

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



            @if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN']))
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="fa fa-users"></i>
                    <p>Utilisateurs</p>
                </a>
            </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fa fa-user"></i>
                        <p>Mon Profile </p>

                    </a>

                </li>

            @endif
                <li class="nav-item">

                    <a class="dropdown-item" href=""
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>

                    <form id="logout-form" action="" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
