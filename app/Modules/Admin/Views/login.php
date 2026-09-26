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
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border-radius: 25px;
            backdrop-filter: blur(20px);
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 25px 50px rgba(0,0,0,0.25);
            color: white;
            padding: 40px;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px);}
            to { opacity: 1; transform: translateY(0);}
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group-text {
            border-radius: 12px 0 0 12px;
            background: rgba(255,255,255,0.9);
            border: none;
        }

        .form-control {
            border-radius: 0 12px 12px 0;
            border: none;
            height: 48px;
            transition: 0.3s;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(255,255,255,0.3);
            transform: scale(1.02);
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 12px;
            cursor: pointer;
            color: #6c757d;
        }

        .btn-login {
            border-radius: 12px;
            height: 45px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .small-link {
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="text-center mb-4">
        <img src="<?= base_url('assets/images/logo.png') ?>" style="width:100px;">
        <h4 class="fw-bold mt-3">E-DIKLAT</h4>
        <small>Silakan login ke akun Anda</small>
    </div>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('process-login') ?>">

        <!-- Email -->
        <div class="input-group">
            <span class="input-group-text">
                <i class="fa fa-envelope text-secondary"></i>
            </span>
            <input type="email" 
                   name="email" 
                   class="form-control" 
                   placeholder="Email"
                   required>
        </div>

        <!-- Password -->
        <div class="input-group position-relative">
            <span class="input-group-text">
                <i class="fa fa-lock text-secondary"></i>
            </span>
            <input type="password" 
                   name="password" 
                   id="password"
                   class="form-control" 
                   placeholder="Password"
                   required>
            <i class="fa fa-eye toggle-password" onclick="togglePassword()"></i>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
            <a href="<?= base_url('register') ?>" class="text-white small-link">
                Belum punya akun?
            </a>
        </div>

        <button type="submit" 
                class="btn btn-light text-primary w-100 btn-login">
            <i class="fa fa-right-to-bracket me-1"></i> Login
        </button>

    </form>

</div>

<script>
function togglePassword() {
    const password = document.getElementById("password");
    const icon = document.querySelector(".toggle-password");

    if (password.type === "password") {
        password.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        password.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>

</body>
</html>