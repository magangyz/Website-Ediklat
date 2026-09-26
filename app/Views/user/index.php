<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h4>Manajemen User</h4>

<a href="<?= base_url('user/create') ?>" class="btn btn-primary mb-3">
    Tambah User
</a>

<table class="table table-bordered">
    <tr>
        <th>Username</th>
        <th>Role</th>
    </tr>
    <?php foreach($users as $u): ?>
    <tr>
        <td><?= $u['username'] ?></td>
        <td><?= $u['role'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?= $this->endSection() ?>