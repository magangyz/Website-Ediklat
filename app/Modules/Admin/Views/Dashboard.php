<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h4 class="fw-bold mb-4">Admin Dashboard</h4>

<div class="row g-4">

    <div class="col-md-3">
        <div class="card shadow-sm border-0 p-3">
            <small>Total Diklat</small>
            <h2 class="fw-bold text-primary"><?= $total_diklat ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0 p-3">
            <small>Total Peserta</small>
            <h2 class="fw-bold text-success"><?= $total_peserta ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0 p-3">
            <small>Diklat Internal</small>
            <h2 class="fw-bold text-warning"><?= $diklat_internal ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0 p-3">
            <small>Diklat Eksternal</small>
            <h2 class="fw-bold text-danger"><?= $diklat_eksternal ?></h2>
        </div>
    </div>

</div>

<?= $this->endSection() ?>