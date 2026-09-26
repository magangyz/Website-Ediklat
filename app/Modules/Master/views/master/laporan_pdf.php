<h3 style="text-align:center;">Laporan Pelatihan Internal</h3>

<table border="1" width="100%" cellspacing="0" cellpadding="5">
<tr>
<th>No</th>
<th>Kegiatan</th>
<th>Peserta</th>
<th>Jumlah</th>
<th>Penyelenggara</th>
<th>Tempat</th>
<th>Waktu</th>
<th>Biaya</th>
</tr>

<?php 
$no=1;
$total=0;
foreach($data as $r): 
$total += $r['biaya'];
?>

<tr>
<td><?= $no++ ?></td>
<td><?= $r['kegiatan'] ?></td>
<td><?= $r['peserta'] ?></td>
<td><?= $r['jumlah'] ?></td>
<td><?= $r['penyelenggara'] ?></td>
<td><?= $r['tempat'] ?></td>
<td><?= date('d-m-Y', strtotime($r['waktu'])) ?></td>
<td><?= number_format($r['biaya']) ?></td>
</tr>

<?php endforeach ?>

<tr>
<th colspan="7">TOTAL</th>
<th><?= number_format($total) ?></th>
</tr>

</table>