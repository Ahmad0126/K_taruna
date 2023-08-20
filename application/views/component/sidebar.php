<div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url($title) ?>">
                    <i class="mdi mdi-account-group"></i>
                    <span class="menu-title">Daftar Anggota</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url($title.'/logs') ?>">
                    <i class="mdi mdi-account-details"></i>
                    <span class="menu-title">Log Anggota</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url($title.'/laporan') ?>">
                    <i class="mdi mdi-menu"></i>
                    <span class="menu-title">Laporan</span>
                </a>
            </li>
        </ul>
    </nav>