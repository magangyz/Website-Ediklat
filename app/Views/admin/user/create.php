<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h5>Tambah User</h5>
    </div>

    <div class="card-body">
        <form action="<?= base_url('admin/user/store') ?>" method="post">

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="<?= base_url('admin/user') ?>" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>

<?= $this->endSection() ?>