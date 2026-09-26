<?php $role = session()->get('role'); ?>
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Dashboard Laporan Diklat</h4>
        <p class="text-muted mb-0">Ringkasan statistik pelatihan internal & eksternal</p>
    </div>

    <!-- SUMMARY CARDS -->
    <div class="row g-4 mb-4">

        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-card border-0 shadow-sm">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Diklat</p>
                    <h2 class="fw-bold mb-0"><?= $total_diklat ?></h2>
                </div>
                <div class="card-accent bg-primary"></div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-card border-0 shadow-sm">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Peserta</p>
                    <h2 class="fw-bold mb-0"><?= $total_peserta ?></h2>
                </div>
                <div class="card-accent bg-success"></div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-card border-0 shadow-sm">
                <div class="card-body">
                    <p class="text-muted mb-1">Peserta Internal</p>
                    <h2 class="fw-bold mb-0"><?= $peserta_internal ?></h2>
                </div>
                <div class="card-accent bg-warning"></div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-card border-0 shadow-sm">
                <div class="card-body">
                    <p class="text-muted mb-1">Peserta Eksternal</p>
                    <h2 class="fw-bold mb-0"><?= $peserta_eksternal ?></h2>
                </div>
                <div class="card-accent bg-danger"></div>
            </div>
        </div>

    </div>

    <!-- DETAIL SECTION -->
    <div class="row g-4">

        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <p class="text-muted mb-2">Total Diklat Internal</p>
                    <h1 class="fw-bold text-warning"><?= $diklat_internal ?></h1>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <p class="text-muted mb-2">Total Diklat Eksternal</p>
                    <h1 class="fw-bold text-danger"><?= $diklat_eksternal ?></h1>
                </div>
            </div>
        </div>

    </div>

</div>

<style>
.dashboard-card {
    position: relative;
    border-radius: 18px;
    overflow: hidden;
    transition: 0.25s ease;
}

.dashboard-card:hover {
    transform: translateY(-4px);
}

.card-accent {
    height: 6px;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
}
</style>

<?= $this->endSection() ?>