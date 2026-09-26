<?php
$appInfo = config('AppInfo');
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= $title ?? '' ?> | <?= esc($appInfo->rsName) ?></title>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body {
        background-color: #f4f6f9;
        font-size: 14px;
        margin: 0;
    }

    /* NAVBAR FIX */
    .navbar {
        height: 52px;
        padding: 0 16px;
        align-items: center;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        height: 52px;
        padding: 0;
        font-size: 15px;
        font-weight: 600;
        white-space: nowrap;
    }

    .navbar-brand img {
        height: 30px;
        width: auto;
        margin-right: 8px;
        display: block;
    }

    .nav-link {
        height: 52px;
        display: flex;
        align-items: center;
        padding: 0 14px;
        font-weight: 500;
        color: #333;
    }

    .nav-link:hover {
        background-color: #f1f1f1;
    }
</style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-fluid px-0">

        <!-- BRAND -->
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <img src="<?= base_url('assets/logo.png') ?>" alt="Logo RS">
            <?= esc($appInfo->rsName) ?>
        </a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <!-- menu -->
            </ul>
        </div>

    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    


        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard') ?>">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>

                <!-- MASTER DATA -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-database"></i> Master Data
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('master/jenis-instansi') ?>">Jenis Instansi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/data-instansi') ?>">Data Instansi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/data-fakultas') ?>">Data Fakultas</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/ruangan') ?>">Ruangan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/tempat-tidur') ?>">Tempat Tidur</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/kegiatan') ?>">Kegiatan</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('diklat') ?>">
                        <i class="bi bi-clipboard-data"></i> Data Diklat
                    </a>
                </li>

                <!-- PELATIHAN -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-journal-bookmark"></i> Pelatihan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('master/pelatihan_internal') ?>">Pelatihan Internal Karyawan </a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/pelatihan_eksternal') ?>">Pelatihan eksternal Karyawan </a></li>
                    </ul>
                </li>

                <!-- LAPORAN -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-file-earmark-text"></i> Laporan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('master/laporan_internal') ?>">Laporan Internal Karyawan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/laporan_eksternal') ?>">Laporan eksternal Karyawan</a></li>
                    </ul>
                </li>
                <?php if(session()->get('role') == 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin-user') ?>">
                        <i class="bi bi-people"></i> Manajemen User
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
