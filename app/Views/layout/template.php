<!DOCTYPE html>
<html>
<head>
    <title>E-Diklat</title>
</head>
<body>

<h2>Selamat Datang, <?= session()->get('username'); ?></h2>

<hr>

<!-- SIDEBAR -->
<div style="width:200px; float:left;">
    <h3>Menu</h3>

    <?php if(session()->get('role') == 'admin'): ?>
        <a href="/admin/dashboard">Dashboard Admin</a><br>
        <a href="/admin/user">Manajemen User</a><br>
        <a href="#">Data Diklat</a><br>
        <a href="#">Laporan</a><br>
    <?php endif; ?>

    <?php if(session()->get('role') == 'user'): ?>
        <a href="/user/dashboard">Dashboard User</a><br>
        <a href="#">Daftar Diklat</a><br>
        <a href="#">Status Pendaftaran</a><br>
        <a href="#">Profil</a><br>
    <?php endif; ?>

    <br>
    <a href="/logout">Logout</a>
</div>

    <?php if(session()->get('role') == 'admin'): ?>
        <a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
        <a href="<?= base_url('master/jenis-instansi') ?>">Jenis Instansi</a>
        <a href="<?= base_url('admin/user') ?>">Manajemen User</a>
    <?php endif; ?>

    <?php if(session()->get('role') == 'user'): ?>
        <a href="<?= base_url('user/dashboard') ?>">Dashboard</a>
        <a href="<?= base_url('master/jenis-instansi') ?>">Jenis Instansi</a>
    <?php endif; ?>
<!-- CONTENT -->
<div style="margin-left:220px;">
    <?= $this->renderSection('content'); ?>
</div>

</body>
</html>