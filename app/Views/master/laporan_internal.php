<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5 class="fw-bold mb-0 text-center">
            Pelatihan Internal Karyawan RSU PKU DELANGGU
        </h5>
    </div>

    <div class="card-body">

        <form method="GET" class="row g-2 mb-3">

            <div class="col-md-3">
                <select name="tahun" class="form-select form-select-sm select2">
                    <option value="">-- Pilih --</option>
                    <?php foreach($tahun_list as $t): ?>
                        <option value="<?= $t['tahun'] ?>" 
                            <?= ($_GET['tahun'] ?? '') == $t['tahun'] ? 'selected' : '' ?>>
                            <?= $t['tahun'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="col-auto">
                <button class="btn btn-sm btn-primary">
                    Cari
                </button>
                <a href="<?= current_url() ?>" class="btn btn-sm btn-secondary">
                    Reset
                </a>

            </div>

            <div class="col-auto ms-auto">
                <a href="<?= base_url('master/laporan/export_internal?' . $_SERVER['QUERY_STRING']) ?>"
                class="btn btn-sm btn-success">
                Cetak Excel
                </a>
                <!-- <a href="<?= base_url('master/laporan/export_internal_pdf?' . $_SERVER['QUERY_STRING']) ?>"
                class="btn btn-sm btn-danger">
                Cetak PDF
                </a> -->

            </div>

        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-sm">
    <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Kegiatan Pelatihan</th>
                        <th>Peserta</th>
                        <th>Jumlah</th>
                        <th>Penyelenggara</th>
                        <th>Tempat</th>
                        <th>Waktu</th>
                        <th>Jam/Hari</th>
                        <th>Biaya</th>
                        <th>Sumber Anggaran</th>
                        <th>Ket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($data): 
                        $no=1; 
                        $total=0;
                        foreach($data as $r): 
                        $total += $r['biaya'];
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= esc($r['kegiatan']) ?></td>
                        <td><?= esc($r['peserta']) ?></td>
                        <td class="text-center"><?= $r['jumlah'] ?></td>
                        <td><?= esc($r['penyelenggara']) ?></td>
                        <td><?= esc($r['tempat']) ?></td>
                        <td class="text-center"><?= date('d-m-Y', strtotime($r['waktu'])) ?></td>
                        <td class="text-center"><?= esc($r['jam_hari']) ?></td>
                        <td class="text-end"><?= number_format($r['biaya'],0) ?></td>
                        <td><?= esc($r['sumber_anggaran']) ?></td>
                        <td><?= esc($r['keterangan']) ?></td>
                    </tr>
                    <?php endforeach ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="11" class="text-center">
                            Tidak ada data
                        </td>
                    </tr>
                    <?php endif ?>
                </tbody>

                <?php if($data): ?>
                <tfoot class="table-light">
                    <tr>
                        <th colspan="8" class="text-end">TOTAL</th>
                        <th class="text-end"><?= number_format($total,0) ?></th>
                        <th colspan="2"></th>
                    </tr>
                </tfoot>
                <?php endif ?>
            </table>

        </div>

    </div>
</div>

<script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "-- Pilih --",
        allowClear: true,
        width: '100%'
    });
});
</script>

<?= $this->endSection() ?>
