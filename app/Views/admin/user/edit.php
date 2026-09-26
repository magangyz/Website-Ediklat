<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h5>Edit User</h5>
    </div>

    <div class="card-body">

        <form method="post"
              action="<?= base_url('admin/user/update/'.$user['id']) ?>">

            <div class="mb-3">
                <label>Username</label>
                <input type="text"
                       name="username"
                       class="form-control"
                       value="<?= $user['username'] ?>">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="<?= $user['email'] ?>">
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="admin"
                        <?= $user['role']=='admin'?'selected':'' ?>>
                        Admin
                    </option>

                    <option value="user"
                        <?= $user['role']=='user'?'selected':'' ?>>
                        User
                    </option>
                </select>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

        </form>

    </div>
</div>

<?= $this->endSection() ?>