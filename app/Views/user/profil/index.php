<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

<div class="row justify-content-center">
<div class="col-md-8">

<div class="card shadow border-0">

<div class="card-body">

<h4 class="text-center mb-4 fw-bold">Profil Saya</h4>

<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success">
<?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<!-- FOTO PROFIL -->
<div class="text-center mb-4">

<?php if (!empty($user['foto'])): ?>
<img id="preview"
src="<?= base_url('uploads/foto/'.$user['foto']) ?>"
class="rounded-circle shadow"
width="130"
height="130"
style="object-fit:cover;border:4px solid #f1f1f1;">
<?php else: ?>
<img id="preview"
src="<?= base_url('uploads/foto/default.png') ?>"
class="rounded-circle shadow"
width="130"
height="130"
style="object-fit:cover;border:4px solid #f1f1f1;">
<?php endif; ?>

</div>

<form action="<?= base_url('user/profil/update') ?>"
method="post"
enctype="multipart/form-data">

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label fw-semibold">Username</label>
<input type="text"
name="username"
class="form-control"
value="<?= $user['username'] ?>">
</div>

<div class="col-md-6 mb-3">
<label class="form-label fw-semibold">Email</label>
<input type="text"
name="email"
class="form-control"
value="<?= $user['email'] ?>">
</div>

</div>

<div class="mb-3">
<label class="form-label fw-semibold">Password Baru</label>
<input type="password"
name="password"
class="form-control"
placeholder="Kosongkan jika tidak ingin mengganti password">
</div>

<div class="mb-4">
<label class="form-label fw-semibold">Foto Profil</label>
<input type="file"
name="foto"
class="form-control"
onchange="previewImage(event)">
</div>

<div class="d-grid">
<button class="btn btn-success btn-lg">
Update Profil
</button>
</div>

</form>

</div>
</div>

</div>
</div>

</div>

<!-- SCRIPT PREVIEW FOTO -->
<script>
a
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