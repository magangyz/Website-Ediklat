<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">

    <!-- HEADER -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold">Data Diklat</h6>
        <?php if(session()->get('role') == 'admin'): ?>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalForm">
            Tambah Diklat
        </button>
        <?php endif; ?>
    </div>

    <!-- FILTER -->
    <form method="get">
    <div class="row g-2 mb-3">

        <div class="col-md-3">
            <select name="instansi_id" class="form-select form-select-sm">
                <option value="">- Semua Instansi -</option>
                <?php foreach ($instansi as $i): ?>
                    <option value="<?= $i['id'] ?>"
                        <?= ($filter['instansi_id']==$i['id'])?'selected':'' ?>>
                        <?= esc($i['nama']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-3">
            <select name="fakultas_id" class="form-select form-select-sm">
                <option value="">- Semua Fakultas -</option>
                <?php foreach ($fakultas as $f): ?>
                    <option value="<?= $f['id'] ?>"
                        <?= ($filter['fakultas_id']==$f['id'])?'selected':'' ?>>
                        <?= esc($f['nama']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-3">
            <select name="kegiatan_id" class="form-select form-select-sm">
                <option value="">- Semua Kegiatan -</option>
                <?php foreach ($kegiatan as $k): ?>
                    <option value="<?= $k['id'] ?>"
                        <?= ($filter['kegiatan_id']==$k['id'])?'selected':'' ?>>
                        <?= esc($k['nama']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-2">
            <select name="status_diklat" class="form-select form-select-sm">
                <option value="">- Semua -</option>
                <option value="belum" <?= ($filter['status_diklat']=='belum')?'selected':'' ?>>Belum</option>
                <option value="aktif" <?= ($filter['status_diklat']=='aktif')?'selected':'' ?>>Aktif</option>
                <option value="selesai" <?= ($filter['status_diklat']=='selesai')?'selected':'' ?>>Selesai</option>
            </select>
        </div>

        <div class="col-md-1">
            <button class="btn btn-sm btn-primary w-100">Cari</button>
        </div>
    </div>

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
                    <option value="100" <?= $limit==100?'selected':'' ?>>100</option>
                </select>
                entri
            </label>
        </div>
    </div>
</form>

    <!-- TABLE -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle mb-0" id="diklatTable">
            <thead class="table-light text-center">
                <tr>
                    <th width="40">No</th>
                    <th width="80">Aksi</th>
                    <th>No Diklat</th>
                    <th>Instansi</th>
                    <th>Fakultas</th>
                    <th> Kegiatan</th>
                    <th>Peserta</th>
                    <th>Ketua</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Akhir</th>
                    <th>Jml Minggu</th>
                    <th>Biaya (Rp)</th>
                    <th>Status Diklat</th>
                    <th>Status Bayar</th>
                </tr>
            </thead>

            <tbody>
            <?php if (!empty($data)): ?>
                <?php $no = 1; foreach ($data as $row): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>

                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Aksi
                            </button>

                            <ul class="dropdown-menu">

                                <?php if(session()->get('role') == 'admin'): ?>

                                    <li>
                                        <a class="dropdown-item"
                                            href="<?= base_url('diklat/proses/'.$row['id']) ?>">
                                            ✏️ Proses Data
                                        </a>
                                    </li>

                                <?php endif; ?>

                                    <li>
                                        <a class="dropdown-item"
                                        href="<?= base_url('diklat/cetak/'.$row['id']) ?>"
                                        target="_blank">
                                            <i class="bi bi-printer text-primary"></i>
                                            Cetak Rincian Biaya
                                        </a>
                                    </li>

                                <?php if(session()->get('role') == 'admin'): ?>
                                    <li><hr class="dropdown-divider"></li>

                                    <li>
                                        <a class="dropdown-item text-danger"
                                        href="<?= base_url('diklat/delete/'.$row['id']) ?>"
                                        onclick="return confirm('Hapus data?')">
                                            <i class="bi bi-trash"></i>
                                            Hapus
                                        </a>
                                    </li>
                                <?php endif; ?>

                                </ul>
                        </div>
                    </td>
                    <td><?= esc($row['no_diklat'] ?? '-') ?></td>
                    <td><?= esc($row['nama_instansi'] ?? '-') ?></td>
                    <td><?= esc($row['nama_fakultas'] ?? '-') ?></td>
                    <td><?= esc($row['nama_kegiatan'] ?? '-') ?></td>
                    <td class="text-center"><?= esc($row['peserta'] ?? 0) ?></td>
                    <td><?= esc($row['ketua']) ?></td>
                    <td><?= esc($row['tgl_mulai']) ?></td>
                    <td><?= esc($row['tgl_akhir']) ?></td>

                    <td class="text-center">
                        <?php 
                        $minggu = 0;
                        if (!empty($row['tgl_mulai']) && !empty($row['tgl_akhir'])) {
                            $minggu = ceil((strtotime($row['tgl_akhir']) - strtotime($row['tgl_mulai'])) / 604800);
                        }
                        echo $minggu;
                        ?>
                    </td>

                    <td class="text-end">
                        <?= number_format($row['total_biaya'] ?? 0, 0, ',', '.') ?>
                    </td>

                    <td class="text-center">
                        <?php
                            $warna = 'warning';
                            if ($row['status_diklat'] == 'aktif') $warna = 'primary';
                            if ($row['status_diklat'] == 'selesai') $warna = 'success';
                        ?>
                        <span class="badge bg-<?= $warna ?>">
                            <?= ucfirst($row['status_diklat'] ?? 'belum') ?>
                        </span>
                    </td>

                    <td class="text-center">
                       <span class="badge bg-<?= ($row['status_bayar'] ?? '')=='lunas'?'success':'danger' ?>">
                            <?= ucfirst($row['status_bayar'] ?? 'belum') ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="14" class="text-center">Data tidak tersedia</td>
                </tr>
            <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalForm" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="<?= base_url('diklat/store') ?>">
                <?= csrf_field() ?>

                <div class="modal-header">
                    <h6 class="modal-title fw-bold">Tambah Baru</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">

                        <!-- JENIS DIKLAT -->
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Jenis Diklat</label>
                            <select name="jenis" id="jenis" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                <option value="internal">Internal</option>
                                <option value="eksternal">Eksternal</option>
                            </select>
                        </div>

                        <!-- INSTANSI -->
                        <div class="col-md-5">
                            <label class="form-label fw-bold">Instansi</label>
                            <select name="instansi_id" id="instansi" class="form-select" required>
                                <option value="">-- Pilih Instansi --</option>
                                <?php foreach($instansi as $i): ?>
                                    <option value="<?= $i['id'] ?>" data-tipe="<?= $i['tipe'] ?>">
                                        <?= $i['nama'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- FAKULTAS -->
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Fakultas</label>
                            <select name="fakultas_id" class="form-select">
                                <option value="">-- Pilih Fakultas --</option>
                                <?php foreach($fakultas as $f): ?>
                                    <option value="<?= $f['id'] ?>"><?= $f['nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- KEGIATAN -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold"> Kegiatan</label>
                            <select name="kegiatan_id" class="form-select" required>
                                <option value="">-- Pilih  Kegiatan --</option>
                                <?php foreach($kegiatan as $k): ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- TANGGAL -->
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-bold">Tanggal Selesai</label>
                            <input type="date" name="tgl_akhir" class="form-control">
                        </div>

                        <!-- KETUA -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Ketua</label>
                            <input type="text" name="ketua" class="form-control">
                        </div>

                        <!-- TELP -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">No Telp</label>
                            <input type="text" name="no_telp" class="form-control">
                        </div>

                        <!-- RUANGAN -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Ruangan</label>
                            <input type="text" name="ruangan" class="form-control">
                        </div>

                        <!-- KETERANGAN -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3"></textarea>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Status Diklat</label>
                            <select name="status_diklat" class="form-select form-select-sm">
                                <option value="belum" selected>Belum</option>
                                <option value="aktif">Aktif</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i> Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="modalEdit" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form method="post" id="formEdit">
      <?= csrf_field() ?>
      <div class="modal-content">
        <div class="modal-header">
          <h6>Edit Diklat</h6>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body row g-2">
          <input type="number" name="peserta" class="form-control mb-2" placeholder="Peserta">
          <input type="text" name="ketua" class="form-control mb-2" placeholder="Ketua">
          <input type="date" name="tgl_mulai" class="form-control mb-2">
          <input type="date" name="tgl_akhir" class="form-control mb-2">
          <input type="number" name="total_biaya" class="form-control mb-2" placeholder="Biaya">
        </div>

        <div class="modal-footer">
          <button class="btn btn-primary btn-sm">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
