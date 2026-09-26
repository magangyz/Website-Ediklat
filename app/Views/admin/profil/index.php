<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

<div class="row justify-content-center">

<div class="col-lg-8">

<!-- PROFILE CARD -->
<div class="card shadow border-0">

<!-- COVER -->
<div style="height:140px;background:linear-gradient(135deg,#4e73df,#1cc88a);border-radius:10px 10px 0 0;">
</div>

<div class="card-body text-center">

<!-- FOTO -->
<?php if (!empty($user['foto'])): ?>
<img id="preview"
src="<?= base_url('uploads/foto/'.$user['foto']) ?>"
class="rounded-circle shadow"
width="120"
height="120"
style="margin-top:-70px;border:5px solid white;object-fit:cover;">
<?php else: ?>
<img id="preview"
src="<?= base_url('uploads/foto/default.png') ?>"
class="rounded-circle shadow"
width="120"
height="120"
style="margin-top:-70px;border:5px solid white;object-fit:cover;">
<?php endif; ?>

<h4 class="mt-3 fw-bold"><?= $user['username'] ?></h4>
<p class="text-muted"><?= $user['email'] ?></p>

</div>

</div>

<!-- FORM EDIT -->
<div class="card shadow border-0 mt-4">

<div class="card-body">

<h5 class="mb-4 fw-bold">Edit Profil</h5>

<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success">
<?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<form action="<?= base_url('user/profil/update') ?>" method="post" enctype="multipart/form-data">

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Username</label>
<input type="text"
name="username"
class="form-control"
value="<?= $user['username'] ?>">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Email</label>
<input type="text"
name="email"
class="form-control"
value="<?= $user['email'] ?>">
</div>

</div>

<div class="mb-3">
<label class="form-label">Password Baru</label>
<input type="password"
name="password"
class="form-control"
placeholder="Kosongkan jika tidak ingin ganti password">
</div>

<div class="mb-4">
<label class="form-label">Foto Profil</label>
<input type="file"
name="foto"
class="form-control"
onchange="previewImage(event)">
</div>

<div class="text-end">
<button class="btn btn-success px-4">
Update Profil
</button>
</div>

</form>

</div>

</div>

</div>

</div>

</div>

<script>
function previewImage(event)
{
const reader = new FileReader();

reader.onload = function(){
document.getElementById('preview').src = reader.result;
}

reader.readAsDataURL(event.target.files[0]);
}
</script>

<?= $this->endSection() ?>