<?php 
$baseURL = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$baseURL .= "://".$_SERVER['HTTP_HOST'] . '/koperasi/admin';
?>
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #00913E;" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <!-- <i class="fa fa-building"></i> -->
            <!-- <img src="../img/logo-antrique.png" width="100"> -->
        </div>
        <div class="    sidebar-brand-text mx-3">KOPERASI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index-admin.php">
            <i class="fas fa-home" style="color: #fff"></i>
            <span style="color: #fff">Dashboard</span></a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= $baseURL  ?>/tabel_anggota.php">
            <i class="fas fa-list-ul" style="color: #fff"></i>
            <span style="color: #fff">Daftar Anggota</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $baseURL  ?>/tabel_simpanan.php">
            <i class="fas fa-list-ul" style="color: #fff"></i>
            <span style="color: #fff">Data Simpanan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $baseURL  ?>/angsuran_simpanan.php">
            <i class="fas fa-list-ul" style="color: #fff"></i>
            <span style="color: #fff">Angsuran Simpanan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $baseURL  ?>/tabel_pinjaman.php">
            <i class="fas fa-list-ul" style="color: #fff"></i>
            <span style="color: #fff">Data Pinjaman</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $baseURL  ?>/create_pinjaman_baru.php">
            <i class="fas fa-list-ul" style="color: #fff"></i>
            <span style="color: #fff">Pencairan Pinjaman</span></a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?= $baseURL  ?>/angsuran_pinjaman.php">
            <i class="fas fa-list-ul" style="color: #fff"></i>
            <span style="color: #fff">Angsuran Pinjaman</span></a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="criteriavalue.php">
            <i class="fas fa-list-ul" style="color: #fff"></i>
            <span style="color: #fff">Perhitungan SHU</span></a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="criteriavalue.php">
            <i class="fas fa-list-ul" style="color: #fff"></i>
            <span style="color: #fff">Criteria Value</span></a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="interndata.php">
            <i class="fas fa-user-friends" style="color: #fff"></i>
            <span style="color: #fff">Intern Data</span></a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="internvalue.php">
            <i class="fas fa-window-restore" style="color: #fff"></i>
            <span style="color: #fff">Intern Value</span></a>
    </li> -->
    <hr class="sidebar-divider my-0">
    <!-- <li class="nav-item">
        <a class="nav-link" href="reportnilai.php">
            <i class="fas fa-file-alt"></i>
            <span>Intern Score Report</span></a>
    </li> -->



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>