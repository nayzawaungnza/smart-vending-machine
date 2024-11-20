<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link--> <a href="./index.html" class="brand-link">
            <!--begin::Brand Image--> <img src="/public/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow">
            <!--end::Brand Image-->
            <!--begin::Brand Text--> <span class="brand-text fw-light">VENDING MACHINE</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open"> <a href="#" class="nav-link active"> <i
                            class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Products
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="/auth/products" class="nav-link active"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Products List</p>
                            </a> </li>
                        <li class="nav-item"> <a href="/auth/products/add" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Add New Product</p>
                            </a> </li>

                    </ul>
                </li>
                <li class="nav-item menu-open"> <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Users
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="/auth/users" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Users List</p>
                            </a> </li>
                        <li class="nav-item"> <a href="/auth/users/add" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Add New User</p>
                            </a> </li>

                    </ul>
                </li>

                <li class="nav-item"> <a href="/auth/transactions" class="nav-link"> <i
                            class="nav-icon bi bi-palette"></i>
                        <p>Transations</p>
                    </a> </li>


            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->