<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column pt-3" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link ">
                    <i class="nav-icon fas fa-solid fa-users"></i>
                    <p>
                        Users
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.main.index')}}" class="nav-link ">
                    <i class="nav-icon fas fa-solid fa-house-user"></i>
                    <p>
                        Home page
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.movie.index')}}" class="nav-link ">
                    <i class="fas fa-solid fa-film"></i>
                    <p>
                        Movies
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.director.index')}}" class="nav-link ">
                    <i class="nav-icon fas fa-solid fa-street-view"></i>
                    <p>
                        Film Directors
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.genre.index')}}" class="nav-link ">
                    <i class="nav-icon fas fa-solid fa-palette"></i>
                    <p>
                        Genres
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.actor.index')}}" class="nav-link ">
                    <i class="nav-icon fas fa-solid fa-user-injured"></i>
                    <p>
                        Actors
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
