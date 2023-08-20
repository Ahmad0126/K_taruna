<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <img class="brandjk" src="<?= base_url('aset/img/logo.png') ?>" alt="">
        <div class="sidebar-brand-text mx-3">Ketua</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Ketua/') ?>">
            <i class="fa fa-users"></i>
            <span>Daftar Anggota</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Ketua/logs') ?>">
            <i class="fa fa-address-card"></i>
            <span>Log Anggota</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Ketua/laporan') ?>">
            <i class="fa fa-address-book"></i>
            <span>Notulensi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>