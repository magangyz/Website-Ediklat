<!DOCTYPE html>
<html>
<head>
    <title>Register - E-Diklat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #198754, #20c997);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-card {
            width: 100%;
            max-width: 420px;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            color: white;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-custom {
            border-radius: 10px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="card register-card p-4">
    <div class="text-center mb-4">
     <img src="<?= base_url('assets/logo.png') ?>" 
        alt="logo"
        style="width:120px;">
    <h5 class="mt-3"></h5>
    </div>


    <div class="text-center mb-4">
        <h4 class="fw-bold">Daftar Akun</h4>
        <small>Buat akun baru</small>
    </div>

    <form method="post" action="<?= base_url('register') ?>">

        <div class="mb-3 input-group">
            <span class="input-group-text">
                <i class="fa fa-user"></i>
            </span>
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>

        <div class="mb-3 input-group">
            <span class="input-group-text">
                <i class="fa fa-envelope"></i>
            </span>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="mb-3 input-group">
            <span class="input-group-text">
                <i class="fa fa-lock"></i>
            </span>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button class="btn btn-light text-success w-100 btn-custom">
            Daftar
        </button>

    </form>

    <div class="text-center mt-3">
        <a href="<?= base_url('login') ?>" class="text-white text-decoration-none">
            Sudah punya akun? Login
        </a>
    </div>

</div>

</body>
</html>
