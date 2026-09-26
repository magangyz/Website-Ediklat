<!DOCTYPE html>
<html>
<head>
    <title>Login - E-Diklat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
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

        .logo {
            width: 80px;
        }

                .btn {
            transition: 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

    </style>
</head>

<body>

<div class="card login-card p-4">
    <div class="text-center mb-4">
     <img src="<?= base_url('assets/logo.png') ?>" 
        alt="logo"
        style="width:120px;">
    </div>


    <div class="text-center mb-4">
        <!-- Ganti dengan logo kamu kalau mau -->
        <!-- <img src="<?= base_url('logo.png') ?>" class="logo mb-2"> -->
        <h4 class="fw-bold">E-DIKLAT</h4>
        <small>Silakan login ke akun Anda</small>
    </div>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login') ?>">

        <div class="mb-3">
            <label>Username</label>
            <input type="text"
                name="username"
                class="form-control"
                required>
        </div>

       
        <div class="mb-3">
            <label>Password</label>
            <input type="password"
                name="password"
                class="form-control"
                required>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">

            <a href="<?= base_url('register') ?>" 
            class="btn btn-outline-light px-4">
                <i class="fa fa-user-plus me-1"></i> Register
            </a>

            <button type="submit" 
                    class="btn btn-light text-primary fw-bold px-4 shadow-sm">
                <i class="fa fa-right-to-bracket me-1"></i> Login
            </button>

        </div>


    </form>

    <div class="text-center mt-3">
        <a href="<?= base_url('register') ?>" class="text-white text-decoration-none">
            Belum punya akun? Daftar
        </a>
    </div>

</div>

</body>
</html>
