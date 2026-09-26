<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card bg-primary text-white p-4">
    <h3>Dashboard User</h3>
    <p>Selamat datang, <?= session()->get('username') ?></p>
</div>

<?= $this->endSection() ?>