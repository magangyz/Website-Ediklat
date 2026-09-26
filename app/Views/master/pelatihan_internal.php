<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">

    <!-- HEADER -->
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold"><?= $title ?></h6>
        <?php if (session()->get('role') === 'admin'): ?>
        <button class="btn btn-primary btn-sm"
                id="btnTambah"
                data-action="<?= base_url('master/pelatihan_internal/store') ?>"
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
                           placeholder="Cari kegiatan / peserta...">
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
                    <th>Kegiatan Pelatihan</th>
                    <th>Peserta</th>
                    <th>Jumlah</th>
                    <th>Penyelenggara</th>
                    <th>Tempat</th>
                    <th>Waktu</th>
                    <th>Jam/Hari</th>
                    <th>Biaya</th>
                    <th>Sumber Anggaran</th>
                    <th>Keterangan</th>
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
                                    <button class="dropdown-item btn-edit"
                                           data-action="<?= base_url('master/pelatihan_internal/update/'.$row['id']) ?>"
                                            data-kegiatan="<?= esc($row['kegiatan']) ?>"
                                            data-peserta="<?= esc($row['peserta']) ?>"
                                            data-jumlah="<?= $row['jumlah'] ?>"
                                            data-penyelenggara="<?= esc($row['penyelenggara']) ?>"
                                            data-tempat="<?= esc($row['tempat']) ?>"
                                            data-waktu="<?= $row['waktu'] ?>"
                                            data-jam_hari="<?= esc($row['jam_hari']) ?>"
                                            data-biaya="<?= $row['biaya'] ?>"
                                            data-sumber_anggaran="<?= esc($row['sumber_anggaran']) ?>"
                                            data-keterangan="<?= esc($row['keterangan']) ?>"
                                            data-aktif="<?= $row['aktif'] ?>"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalForm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger"
                                       href="<?= base_url('master/pelatihan_internal/delete/'.$row['id']) ?>"
                                       onclick="return confirm('Hapus data ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <?php endif; ?>
                    <td><?= esc($row['kegiatan']) ?></td>
                    <td><?= esc($row['peserta']) ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= esc($row['penyelenggara']) ?></td>
                    <td><?= esc($row['tempat']) ?></td>
                    <td><?= esc($row['waktu']) ?></td>
                    <td><?= esc($row['jam_hari']) ?></td>
                    <td><?= number_format($row['biaya'],2) ?></td>
                    <td><?= esc($row['sumber_anggaran']) ?></td>
                    <td><?= esc($row['keterangan']) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL FORM -->
<div class="modal fade" id="modalForm">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <form method="post" id="formPelatihan">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalTitle">Tambah Pelatihan</h6>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="jenis" value="internal">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="small">Kegiatan Pelatihan</label>
                            <input type="text" name="kegiatan" id="kegiatan" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6">
                            <label class="small">Peserta</label>
                            <input type="text" name="peserta" id="peserta" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-2">
                            <label class="small">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-5">
                            <label class="small">Penyelenggara</label>
                            <input type="text" name="penyelenggara" id="penyelenggara" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-5">
                            <label class="small">Tempat</label>
                            <input type="text" name="tempat" id="tempat" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label class="small">Waktu</label>
                            <input type="date" name="waktu" id="waktu" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <label class="small">Jam/Hari</label>
                            <input type="text" name="jam_hari" id="jam_hari" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <label class="small">Biaya</label>
                            <input type="number" step="0.01" name="biaya" id="biaya" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <label class="small">Sumber Anggaran</label>
                            <input type="text" name="sumber_anggaran" id="sumber_anggaran" class="form-control form-control-sm">
                        </div>
                    </div>

                    <label class="small">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control form-control-sm mb-2"></textarea>

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
const form = document.getElementById('formPelatihan');

document.getElementById('btnTambah').addEventListener('click', function () {
    modalTitle.innerText = 'Tambah Pelatihan';
    form.action = this.dataset.action;
    form.reset();
});

document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', function () {
        modalTitle.innerText = 'Edit Pelatihan';
        form.action = this.dataset.action;

        document.getElementById('kegiatan').value = this.dataset.kegiatan;
        document.getElementById('peserta').value = this.dataset.peserta;
        document.getElementById('jumlah').value = this.dataset.jumlah;
        document.getElementById('penyelenggara').value = this.dataset.penyelenggara;
        document.getElementById('tempat').value = this.dataset.tempat;
        document.getElementById('waktu').value = this.dataset.waktu;
        document.getElementById('jam_hari').value = this.dataset.jam_hari;
        document.getElementById('biaya').value = this.dataset.biaya;
        document.getElementById('sumber_anggaran').value = this.dataset.sumber_anggaran;
        document.getElementById('keterangan').value = this.dataset.keterangan;

        document.querySelectorAll('[name="aktif"]').forEach(r => {
            r.checked = r.value === this.dataset.aktif;
        });
    });
});
</script>

<?= $this->endSection() ?>
