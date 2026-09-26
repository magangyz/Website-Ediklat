<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h4>Tambah User</h4>

<form action="<?= base_url('user/store') ?>" method="post">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>

    <button class="btn btn-success">Simpan</button>
</form>

<?= $this->endSection() ?>