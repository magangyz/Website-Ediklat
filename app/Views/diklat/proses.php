<?php /**
 * FILE : app/Modules/Diklat/Views/diklat/proses.php
 * STATUS : SUDAH DIRAPIKAN & BUG FIX
 * MASALAH : PESERTA HANYA TERSIMPAN 1 -> FIX
 */ ?>

<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold">Proses Data Diklat</h6>
    </div>

```
<div class="card-body">

<form method="post" action="<?= base_url('diklat/simpanProses/'.$row['id']) ?>" enctype="multipart/form-data">
<?= csrf_field() ?>

<div class="text-end mb-3">
    <button type="submit" name="aksi" value="cetak" class="btn btn-sm btn-primary">Simpan & Cetak</button>
</div>

<!-- ================= HEADER ================= -->
<div class="row g-3 mb-3">
    <div class="col-md-4">
        <label class="form-label fw-semibold">Instansi</label>
        <input type="text" class="form-control form-control-sm" value="<?= esc($row['nama_instansi']) ?>" readonly>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Fakultas</label>
        <input type="text" class="form-control form-control-sm" value="<?= esc($row['nama_fakultas']) ?>" readonly>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Kegiatan</label>
        <input type="text" class="form-control form-control-sm" value="<?= esc($row['nama_kegiatan']) ?>" readonly>
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Ketua</label>
        <input type="text" name="ketua" class="form-control form-control-sm" value="<?= esc($row['ketua']) ?>">
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Tgl Mulai</label>
        <input type="date" name="tgl_mulai" class="form-control form-control-sm" value="<?= esc($row['tgl_mulai']) ?>" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Tgl Akhir</label>
        <input type="date" name="tgl_akhir" class="form-control form-control-sm" value="<?= esc($row['tgl_akhir']) ?>" required>
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Ruangan</label>
        <input type="text" name="ruangan" class="form-control form-control-sm" value="<?= esc($row['ruangan']) ?>">
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">No Telp</label>
        <input type="text" name="no_telp" class="form-control form-control-sm" value="<?= esc($row['no_telp']) ?>">
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Keterangan</label>
        <input type="text" name="keterangan" class="form-control form-control-sm" value="<?= esc($row['keterangan']) ?>">
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Status Diklat</label>
        <select name="status_diklat" class="form-select form-select-sm">
            <option value="belum" <?= $row['status_diklat']=='belum'?'selected':'' ?>>Belum</option>
            <option value="aktif" <?= $row['status_diklat']=='aktif'?'selected':'' ?>>Aktif</option>
            <option value="selesai" <?= $row['status_diklat']=='selesai'?'selected':'' ?>>Selesai</option>
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Upload Tanda Tangan</label>
        <input type="file" name="ttd" class="form-control form-control-sm">
    </div>
    <?php if(!empty($row['ttd'])): ?>
    <div class="col-md-4">
        <label class="form-label fw-semibold">TTD Saat Ini</label><br>
        <img src="<?= base_url('uploads/ttd/'.$row['ttd']) ?>" width="120">
    </div>
    <?php endif; ?>
</div>

<hr>

<!-- ================= PESERTA ================= -->
<h6 class="fw-bold">Rincian Data Peserta</h6>
<table class="table table-bordered table-sm" id="tablePeserta">
    <thead class="table-light text-center">
        <tr>
            <th width="40">No</th>
            <th>Nama</th>
            <th>NIM / KTP</th>
            <th>JK</th>
            <th>No Telp</th>
            <th width="40"></th>
        </tr>
    </thead>
    <tbody>
    <?php if($peserta): foreach($peserta as $i=>$p): ?>
        <tr>
            <td class="text-center"><?= $i+1 ?></td>
            <td><input type="text" name="peserta_nama[]" class="form-control form-control-sm" value="<?= esc($p['nama']) ?>"></td>
            <td><input type="text" name="peserta_id[]" class="form-control form-control-sm" value="<?= esc($p['nik']) ?>"></td>
            <td>
                <select name="peserta_jk[]" class="form-select form-select-sm">
                    <option <?= $p['jk']=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
                    <option <?= $p['jk']=='Perempuan'?'selected':'' ?>>Perempuan</option>
                </select>
            </td>
            <td><input type="text" name="peserta_telp[]" class="form-control form-control-sm" value="<?= esc($p['no_telp']) ?>"></td>
            <td class="text-center"><button type="button" class="btn btn-sm btn-danger btn-hapus">✕</button></td>
        </tr>
    <?php endforeach; else: ?>
        <tr>
            <td class="text-center">1</td>
            <td><input type="text" name="peserta_nama[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="peserta_id[]" class="form-control form-control-sm"></td>
            <td>
                <select name="peserta_jk[]" class="form-select form-select-sm">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </td>
            <td><input type="text" name="peserta_telp[]" class="form-control form-control-sm"></td>
            <td></td>
        </tr>
    <?php endif ?>
    </tbody>
</table>

<button type="button" id="addPeserta" class="btn btn-sm btn-outline-primary mb-3">+ Tambah Peserta</button>

<hr>

<!-- ================= BIAYA ================= -->
<h6 class="fw-bold">Rincian Biaya</h6>
<table class="table table-bordered table-sm" id="tableBiaya">
    <thead class="table-light text-center">
        <tr>
            <th width="40">No</th>
            <th>Tgl</th>
            <th>Keterangan</th>
            <th>Orang</th>
            <th>Qty</th>
            <th>Nominal</th>
            <th>Subtotal</th>
            <th width="40"></th>
        </tr>
    </thead>
    <tbody>
    <?php if($biaya): foreach($biaya as $i=>$b): ?>
        <tr>
            <td class="text-center"><?= $i+1 ?></td>
            <td><input type="date" name="tgl[]" value="<?= esc($b['tgl_input']) ?>" class="form-control form-control-sm"></td>
            <td><input type="text" name="tarif[]" value="<?= esc($b['tarif']) ?>" class="form-control form-control-sm"></td>
            <td><input type="number" name="orang[]" value="<?= esc($b['orang']) ?>" class="form-control form-control-sm"></td>
            <td><input type="number" name="qty[]" value="<?= esc($b['qty']) ?>" class="form-control form-control-sm qty"></td>
            <td><input type="number" name="nominal[]" value="<?= esc($b['nominal']) ?>" class="form-control form-control-sm nominal"></td>
            <td><input type="number" class="form-control form-control-sm subtotal" value="<?= esc($b['subtotal']) ?>" readonly></td>
            <td class="text-center"><button type="button" class="btn btn-sm btn-danger btn-hapus">✕</button></td>
        </tr>
    <?php endforeach; else: ?>
        <tr>
            <td class="text-center">1</td>
            <td><input type="date" name="tgl[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="tarif[]" class="form-control form-control-sm"></td>
            <td><input type="number" name="orang[]" class="form-control form-control-sm"></td>
            <td><input type="number" name="qty[]" class="form-control form-control-sm qty"></td>
            <td><input type="number" name="nominal[]" class="form-control form-control-sm nominal"></td>
            <td><input type="number" class="form-control form-control-sm subtotal" readonly></td>
            <td></td>
        </tr>
    <?php endif ?>
    </tbody>
</table>

<button type="button" id="addBiaya" class="btn btn-sm btn-outline-primary mb-3">+ Tambah Biaya</button>

<div class="text-end">
    <button type="submit" class="btn btn-success btn-sm">Simpan Proses</button>
</div>

</form>

</div>
```

</div>

<script>
document.addEventListener('click', function(e){
    if(e.target.id==='addPeserta'){
        let tbody=document.querySelector('#tablePeserta tbody');
        let no=tbody.rows.length+1;
        let tr=document.createElement('tr');
        tr.innerHTML=`<td class="text-center">${no}</td>
        <td><input type="text" name="peserta_nama[]" class="form-control form-control-sm"></td>
        <td><input type="text" name="peserta_id[]" class="form-control form-control-sm"></td>
        <td><select name="peserta_jk[]" class="form-select form-select-sm"><option>Laki-laki</option><option>Perempuan</option></select></td>
        <td><input type="text" name="peserta_telp[]" class="form-control form-control-sm"></td>
        <td class="text-center"><button type="button" class="btn btn-sm btn-danger btn-hapus">✕</button></td>`;
        tbody.appendChild(tr);
    }

    if(e.target.id==='addBiaya'){
        let tbody=document.querySelector('#tableBiaya tbody');
        let no=tbody.rows.length+1;
        let tr=document.createElement('tr');
        tr.innerHTML=`<td class="text-center">${no}</td>
        <td><input type="date" name="tgl[]" class="form-control form-control-sm"></td>
        <td><input type="text" name="tarif[]" class="form-control form-control-sm"></td>
        <td><input type="number" name="orang[]" class="form-control form-control-sm"></td>
        <td><input type="number" name="qty[]" class="form-control form-control-sm qty"></td>
        <td><input type="number" name="nominal[]" class="form-control form-control-sm nominal"></td>
        <td><input type="number" class="form-control form-control-sm subtotal" readonly></td>
        <td class="text-center"><button type="button" class="btn btn-sm btn-danger btn-hapus">✕</button></td>`;
        tbody.appendChild(tr);
    }

    if(e.target.classList.contains('btn-hapus')){
        e.target.closest('tr').remove();
    }
});

</script>

<?= $this->endSection() ?>
