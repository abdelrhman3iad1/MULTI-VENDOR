<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link"> <!--begin::Brand Image--> <img src="{{ asset('dist/assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">{{Auth::user()->name}}</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn ms-5 mb-2 btn-sm btn-outline-primary">Logout</button>
                </form>
                <li class="nav-item menu-open"> <a href="#" class="nav-link active"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Category
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{route('dashboard.categories.index')}}" class="nav-link active"> <i class="nav-icon bi bi-circle"></i>
                                <p>All Categories</p>
                            </a> </li>
                                            </ul>
                </li>
                <li class="nav-item"> <a href="./generate/theme.html" class="nav-link"> <i class="nav-icon bi bi-palette"></i>
                        <p>Theme Generate</p>
                    </a> </li>
                <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside>  
