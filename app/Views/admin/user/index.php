<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- DASHBOARD STATISTICS -->
<div class="row g-4 mb-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-white bg-primary p-4 rounded-4">
            <h2 class="fw-bold"><?= $totalUsers ?? 0 ?></h2>
            <p class="mb-0">Total Users</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-white bg-danger p-4 rounded-4">
            <h2 class="fw-bold"><?= $totalAdmin ?? 0 ?></h2>
            <p class="mb-0">Total Admin</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-white bg-success p-4 rounded-4">
            <h2 class="fw-bold"><?= $totalUser ?? 0 ?></h2>
            <p class="mb-0">Total User</p>
        </div>
    </div>

</div>


<!-- USER TABLE -->
<div class="card border-0 shadow-sm rounded-4">

    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0">
            <i class="fa fa-users me-2 text-primary"></i>
            Manajemen User
        </h5>

        <a href="<?= base_url('admin/user/create') ?>"
           class="btn btn-primary rounded-pill px-4">
            <i class="fa fa-plus me-1"></i> Tambah User
        </a>
    </div>

    <div class="card-body">

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success rounded-4">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>


        <div class="table-responsive">

            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach($users as $key => $user): ?>

                    <tr>
                        <td><?= $key+1 ?></td>

                        <td>
                            <div class="fw-semibold">
                                <?= $user['username'] ?>
                            </div>
                        </td>

                        <td><?= $user['email'] ?></td>

                        <td>
                            <span class="badge rounded-pill bg-<?= $user['role']=='admin' ? 'danger' : 'secondary' ?>">
                                <?= strtoupper($user['role']) ?>
                            </span>
                        </td>

                        <td class="text-center">

                            <a href="<?= base_url('admin/user/edit/'.$user['id']) ?>"
                               class="btn btn-outline-warning btn-sm rounded-pill px-3">
                                <i class="fa fa-edit me-1"></i> Edit
                            </a>

                            <a href="<?= base_url('admin/user/delete/'.$user['id']) ?>"
                               onclick="return confirm('Hapus user ini?')"
                               class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                <i class="fa fa-trash me-1"></i> Hapus
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection() ?>