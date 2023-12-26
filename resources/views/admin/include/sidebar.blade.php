<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: 0.8" />
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search" />
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{route('admin:dashboard')}}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
                <li class="nav-item menu-open">
                    <a href="{{route('admin:user.list')}}" class="nav-link {{ (request()->is('admin/user/list')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                        <p>
                           Users

                        </p>
                    </a>

                </li>
                <li class="nav-item menu-open">
                    <a href="{{route('admin:category.list')}}" class="nav-link {{ (request()->is('admin/category/list')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-alt "></i>
                        <p>
                           Category

                        </p>
                    </a>

                </li>
                <li class="nav-item menu-open">
                    <a href="{{route('admin:product.list')}}" class="nav-link {{ (request()->is('admin/product/list')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-alt "></i>
                        <p>
                           Product

                        </p>
                    </a>

                </li>
                <li class="nav-item menu-open">
                    <a href="{{route('admin:all.orders')}}" class="nav-link {{ (request()->is('admin/orders')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-alt "></i>
                        <p>
                           Orders

                        </p>
                    </a>

                </li>



                <li class="nav-item menu-open">
                    <a href="{{route('admin:logout')}}" class="nav-link ">
                    <i class="nav-icon fas fa-arrow-right"></i>
                        <p>
                            Logout

                        </p>
                    </a>

                </li>

            </ul>
        </nav>
    </div>
</aside>
