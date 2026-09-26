<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h4 class="fw-bold mb-4">User Dashboard</h4>

<div class="card shadow-sm border-0 p-4">
    <small>Diklat yang Anda Ikuti</small>
    <h1 class="fw-bold text-primary">
        <?= $total_diklat_diikuti ?>
    </h1>
</div>

<?= $this->endSection() ?>