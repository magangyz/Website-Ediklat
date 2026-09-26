<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">

<style>
    body {
        font-family: "Times New Roman";
        font-size: 12px;
        color: #000;
        line-height: 1.5;
        margin: 20px 30px;
    }

    .container {
        position: relative;
        z-index: 2;
    }

    /* WATERMARK */
    .watermark{
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0.10;
        z-index: 0;
    }

    .watermark img{
        width: 400px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #000;
        padding: 6px 6px;
        vertical-align: middle;
    }

    th {
        background: #f2f2f2;
        text-align: center;
        font-weight: bold;
    }

    .text-center { text-align: center; }
    .text-right { text-align: right; }
    .text-left { text-align: left; }

    .no-border td {
        border: none;
        padding: 2px 4px;
    }

    .header-table td {
        border: none;
        vertical-align: middle;
    }

    .logo {
        width: 80px;
    }

    .header-title {
        font-size: 18px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .sub-title {
        font-size: 12px;
    }

    hr.double {
        border-top: 2px solid #000;
        border-bottom: 1px solid #000;
        height: 3px;
        margin: 8px 0 12px 0;
    }

    h3 {
        margin: 8px 0 8px 0;
        text-align: center;
        text-decoration: underline;
    }

    .table-title {
        font-weight: bold;
        margin: 12px 0 6px 0;
        font-size: 13px;
    }

    .total-row th {
        background: #e0e0e0;
        font-size: 13px;
    }

    .signature {
        margin-top: 40px;
        width: 100%;
    }

    .signature img{
    margin-bottom:10px;
    }
</style>
</head>
<body>

<?php
$path = FCPATH . 'assets/logo.png';
$base64 = 'data:image/png;base64,' . base64_encode(file_get_contents($path));
?>

<!-- WATERMARK -->
<div class="watermark">
    <img src="<?= $base64 ?>">
</div>

<div class="container">

<!-- HEADER -->
<table class="header-table">
<tr>
    <td width="15%" class="text-center">
        <img src="<?= $base64 ?>" class="logo">
    </td>
    <td width="85%" class="text-center">
        <div class="header-title">RUMAH SAKIT UMUM</div>
        <div class="header-title">PKU MUHAMMADIYAH DELANGGU</div>
        <div class="sub-title">
            Jl. Raya Delanggu Utara No. 19 Telp. (0272) 551051, 554041<br>
            Website: pku-delanggu.com | Email: pkudlgsekretariat@gmail.com
        </div>
    </td>
</tr>
</table>

<hr class="double">

<h3>RINCIAN BIAYA DIKLAT</h3>

<table class="no-border">
<tr><td width="30%">No. Diklat</td><td>: <?= esc($diklat['no_diklat'] ?? '-') ?></td></tr>
<tr><td>Instansi</td><td>: <?= esc($diklat['nama_instansi'] ?? '-') ?></td></tr>
<tr><td>Fakultas</td><td>: <?= esc($diklat['nama_fakultas'] ?? '-') ?></td></tr>
<tr><td>Kegiatan</td><td>: <?= esc($diklat['nama_kegiatan'] ?? '-') ?></td></tr>
<tr><td>Ketua</td><td>: <?= esc($diklat['ketua'] ?? '-') ?></td></tr>
<tr><td>Tgl Mulai</td><td>: <?= esc($diklat['tgl_mulai'] ?? '-') ?></td></tr>
<tr><td>Tgl Selesai</td><td>: <?= esc($diklat['tgl_akhir'] ?? '-') ?></td></tr>
<tr><td>Ruangan</td><td>: <?= esc($diklat['ruangan'] ?? '-') ?></td></tr>
<tr><td>Keterangan</td><td>: <?= esc($diklat['keterangan'] ?? '-') ?></td></tr>
<tr><td>No Telp</td><td>: <?= esc($diklat['no_telp'] ?? '-') ?></td></tr>
</table>

<div class="table-title">DATA PESERTA</div>
<table>
<tr>
    <th width="5%">No</th>
    <th>Nama Mahasiswa</th>
    <th width="20%">NIK</th>
    <th width="15%">JK</th>
    <th width="20%">No Telp</th>
</tr>
<?php $no=1; foreach($peserta as $p): ?>
<tr>
    <td class="text-center"><?= $no++ ?></td>
    <td><?= esc($p['nama'] ?? '-') ?></td>
    <td><?= esc($p['nik'] ?? '-') ?></td>
    <td class="text-center"><?= esc($p['jk'] ?? '-') ?></td>
    <td><?= esc($p['no_telp'] ?? '-') ?></td>
</tr>
<?php endforeach ?>
</table>

<div class="table-title">RINCIAN BIAYA</div>
<table>
<tr>
    <th width="5%">No</th>
    <th>Keterangan</th>
    <th width="10%">Orang</th>
    <th width="10%">Hari</th>
    <th width="15%">Nominal</th>
    <th width="15%">Jumlah</th>
</tr>

<?php 
$no=1; 
$total=0;
foreach($biaya as $b):
$subtotal = $b['orang'] * $b['qty'] * $b['nominal'];
$total += $subtotal;
?>
<tr>
    <td class="text-center"><?= $no++ ?></td>
    <td><?= esc($b['tarif']) ?></td>
    <td class="text-center"><?= $b['orang'] ?></td>
    <td class="text-center"><?= $b['qty'] ?></td>
    <td class="text-right"><?= number_format($b['nominal'],0,',','.') ?></td>
    <td class="text-right"><?= number_format($subtotal,0,',','.') ?></td>
</tr>
<?php endforeach ?>

<tr class="total-row">
    <th colspan="5">TOTAL BIAYA</th>
    <th class="text-right"><?= number_format($total,0,',','.') ?></th>
</tr>
</table>

<table class="no-border signature">
<tr>
<td width="60%"></td>
<td class="text-center">

    Klaten, <?= date('d-m-Y') ?><br><br>

    <?php if(!empty($diklat['ttd'])): ?>
    <?php
    $pathTtd = FCPATH.'uploads/ttd/'.$diklat['ttd'];
    $ttdBase64 = 'data:image/png;base64,'.base64_encode(file_get_contents($pathTtd));
    ?>
    <img src="<?= $ttdBase64 ?>" width="120"><br>
    <?php else: ?>
    <br><br><br>
    <?php endif; ?>

    <b><?= esc($diklat['ketua'] ?? '________________') ?></b><br>
    Ketua Pelaksana

</td>
</tr>
</table>

</div>
</body>
</html>
