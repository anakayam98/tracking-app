<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('sbadmin/img/logojayla.png') }}" alt="Logo" width="25" height="25">
                </div>
                <div class="sidebar-brand-text mx-3">Jayla Tech.ID </div>
            </a>

    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Servis -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Servis</span>
        </a>
    </li>


    <!-- Nav Item - Data Master Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
            aria-expanded="false" aria-controls="collapseMaster">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pelanggan.index') }}">Data Pelanggan</a>
                <a class="collapse-item" href="{{ route('jasa.index') }}">Data Jasa</a>
                <a class="collapse-item" href="{{ route('barang.index') }}">Data Barang</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

            <!-- Heading -->
    <div class="sidebar-heading">
    </div>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan</span></a>
    </li>
</ul>
