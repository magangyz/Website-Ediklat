<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">

    <!-- HEADER -->
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold">Data Fakultas</h6>
        <?php if (session()->get('role') === 'admin'): ?>
        <button class="btn btn-primary btn-sm"
                id="btnTambah"
                data-action="<?= base_url($url.'/store') ?>"
                data-bs-toggle="modal"
                data-bs-target="#modalForm">
            <i class="bi bi-plus-lg"></i> Tambah Baru
        </button>
         <?php endif; ?>
    </div>
<div class="card-body pb-0">
        <form method="get">
        <div class="row mb-3 align-items-center">

            <div class="col-md-6">
    <label class="small">
        Tampilkan
        <select name="limit"
                class="form-select form-select-sm d-inline-block w-auto mx-1"
                onchange="this.form.submit()">

            <option value="10" <?= $limit==10?'selected':'' ?>>10</option>
            <option value="25" <?= $limit==25?'selected':'' ?>>25</option>
            <option value="50" <?= $limit==50?'selected':'' ?>>50</option>
            <option value="all" <?= $limit=='all'?'selected':'' ?>>Semua</option>

        </select>
        entri
    </label>
</div>


            <div class="col-md-6 text-end">
                <label class="small">
                    Cari:
                    <input type="search"
                        name="q"
                        value="<?= esc($q ?? '') ?>"
                        class="form-control form-control-sm d-inline-block w-auto ms-1"
                        placeholder="Cari kode / nama...">
                </label>
            </div>

        </div>
        </form>

    </div>
    <!-- TABLE -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover mb-0 align-middle">
            <thead class="table-light small text-uppercase">
                <tr>
                    <th width="50">No</th>
                    <?php if (session()->get('role') === 'admin'): ?>
                    <th width="50">Aksi</th>
                    <?php endif; ?>
                    <th width="100">Kode</th>
                    <th>Nama Fakultas</th>
                    <th width="80" class="text-center">Aktif</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($data as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <?php if (session()->get('role') === 'admin'): ?>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                                Aksi
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <button
                                        class="dropdown-item btn-edit"
                                        data-action="<?= base_url($url.'/update/'.$row['id']) ?>"
                                        data-kode="<?= esc($row['kode']) ?>"
                                        data-nama="<?= esc($row['nama']) ?>"
                                        data-aktif="<?= $row['aktif'] ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalForm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger"
                                       href="<?= base_url($url.'/delete/'.$row['id']) ?>"
                                       onclick="return confirm('Hapus data ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <?php endif; ?>
                    <td><?= esc($row['kode']) ?></td>
                    <td><?= esc($row['nama']) ?></td>
                    <td class="text-center"><?= $row['aktif']==1?'✔':'✖' ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>

<!-- MODAL FORM -->
<div class="modal fade" id="modalForm">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <form method="post" id="formFakultas">
                <?= csrf_field() ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="modalTitle">Tambah Fakultas</h6>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="small">Kode</label>
                            <input name="kode" id="kode" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-8">
                            <label class="small">Nama Fakultas</label>
                            <input name="nama" id="nama" class="form-control form-control-sm" required>
                        </div>
                    </div>

                    <label class="small">Status</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aktif" value="1" checked>
                        <label class="form-check-label">Aktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aktif" value="0">
                        <label class="form-check-label">Tidak</label>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>
<div class="card-footer bg-white d-flex justify-content-between align-items-center small">
        <div>
            Menampilkan 1 sampai <?= count($data) ?> dari <?= count($data) ?> entri
        </div>
        <div>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link">Sebelumnya</a></li>
                    <li class="page-item active"><a class="page-link">1</a></li>
                    <li class="page-item disabled"><a class="page-link">Selanjutnya</a></li>
                </ul>
            </nav>
        </div>
    </div>
<script>
const modalTitle = document.getElementById('modalTitle');
const form = document.getElementById('formFakultas');

document.getElementById('btnTambah').addEventListener('click', function () {
    modalTitle.innerText = 'Tambah Fakultas';
    form.action = this.dataset.action;
    form.reset();
});

document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', function () {
        modalTitle.innerText = 'Edit Fakultas';
        form.action = this.dataset.action;

        document.getElementById('kode').value = this.dataset.kode;
        document.getElementById('nama').value = this.dataset.nama;

        document.querySelectorAll('[name="aktif"]').forEach(r => {
            r.checked = r.value === this.dataset.aktif;
        });
    });
});
</script>

<?= $this->endSection() ?>
