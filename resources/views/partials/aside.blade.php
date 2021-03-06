<aside class="main-sidebar sidebar-dark-primary elevation-1">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="{{ asset('admin-lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Maula Hijab</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">Admin</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview {{ Request::is('inventory/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('inventory/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Inventory
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('barang') }}" class="nav-link {{ Request::is('inventory/barang') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('list_bahan') }}" class="nav-link {{ Request::is('inventory/bahan') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Bahan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('list_jenis_bahan') }}" class="nav-link {{ Request::is('inventory/jenis/bahan') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jenis Bahan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('induk') }}" class="nav-link {{ Request::is('inventory/induk') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Induk</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{ Request::is('produksi/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('produksi/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-box-open"></i>
                <p>
                    Produksi
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('wos') }}" class="nav-link {{ Request::is('produksi/wos') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Work Order Sheet</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penjahit') }}" class="nav-link {{ Request::is('produksi/penjahit') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Penjahit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembayaran') }}" class="nav-link {{ Request::is('produksi/pembayaran') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pembayaran</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{ Request::is('penjualan/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('penjualan/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-store"></i>
                <p>
                    Penjualan
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('wos') }}" class="nav-link {{ Request::is('penjualan/lazada') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lazada</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penjahit') }}" class="nav-link {{ Request::is('penjualan/shopee') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Shopee</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembayaran') }}" class="nav-link {{ Request::is('penjualan/tokopedia') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tokopedia</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembayaran') }}" class="nav-link {{ Request::is('penjualan/blibli') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>BliBli</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Data Penjahit</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
            </p>
            </a>
        </li> -->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>