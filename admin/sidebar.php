<?php
// panggil file yang dibutuhkan
require_once 'session.php';
require_once '../koneksi.php';
require_once 'functions.php';

if (!isset($_SESSION['auth'])) {
    set_flash_message('gagal', 'Anda harus login dulu!');
    header('Location: ../index.php');
}

$kelas1 = "ADMIN"

?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $kelas1; ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard   -->
    <li class="nav-item ">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a href="<?= base_url('admin/data_karyawan.php') ?>" class="nav-link">
            <i class="fas fa-fw fa-users"></i>
            <span>Karyawan</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('admin/absensi.php') ?>" class="nav-link">
            <i class="fas fa-fw fa-list"></i>
            <span>Absensi Karyawan</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('admin/laporan.php') ?>" class="nav-link">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>