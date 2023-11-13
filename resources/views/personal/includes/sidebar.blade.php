<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column pt-3" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('personal.main.index')}}" class="nav-link ">
                    <i class="nav-icon fas fa-solid fa-house-user"></i>
                    <p>
                        Home page
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.liked.index')}}" class="nav-link ">
                    <i class="nav-icon fas fa-regular fa-heart"></i>
                    <p>
                        Liked posts
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.comment.index')}}" class="nav-link ">
                    <i class="nav-icon fas fa-regular fa-comment"></i>
                    <p>
                        Comments
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
