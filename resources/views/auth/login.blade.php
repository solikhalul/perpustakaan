<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Library Management</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #123b5d, #0b2942);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1050px;
            min-height: 590px;
            display: grid;
            grid-template-columns: 1fr 0.95fr;
            background: #ffffff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 25px 55px rgba(0, 0, 0, 0.25);
        }

        .left-panel {
            position: relative;
            background: linear-gradient(145deg, #173f60, #285d86);
            color: white;
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .left-panel::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 50%;
            top: -120px;
            right: -80px;
        }

        .left-panel::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -150px;
            left: -100px;
        }

        .brand {
            position: relative;
            z-index: 2;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .left-content {
            position: relative;
            z-index: 2;
            margin: 25px 0;
        }

        .book-icon {
            width: 78px;
            height: 78px;
            border-radius: 21px;
            background: rgba(255, 255, 255, 0.13);
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            margin-bottom: 25px;
        }

        .left-content h1 {
            font-size: 40px;
            line-height: 1.12;
            margin-bottom: 20px;
            font-weight: 800;
        }

        .left-content h1 span {
            color: #9ed6ff;
        }

        .left-content p {
            font-size: 15px;
            line-height: 1.7;
            max-width: 430px;
            color: #e6f3ff;
        }

        .features {
            position: relative;
            z-index: 2;
            border-top: 1px solid rgba(255, 255, 255, 0.18);
            padding-top: 22px;
            display: flex;
            gap: 45px;
        }

        .feature {
            text-align: center;
        }

        .feature-icon {
            font-size: 21px;
            margin-bottom: 7px;
        }

        .feature span {
            display: block;
            color: #e4f2ff;
            font-size: 13px;
        }

        .right-panel {
            background: #f7faff;
            padding: 48px;
            display: flex;
            align-items: center;
        }

        .login-content {
            width: 100%;
            max-width: 430px;
            margin: auto;
        }

        .welcome {
            color: #7190a8;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 9px;
        }

        .login-content h2 {
            font-size: 35px;
            color: #183d5d;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #71869a;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #25445e;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 17px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
            z-index: 2;
        }

        .input-wrapper input {
            width: 100%;
            height: 52px;
            border: 1px solid #d6e2ef;
            border-radius: 13px;
            background: #eaf2ff;
            padding: 0 17px 0 47px;
            font-size: 14px;
            outline: none;
            transition: 0.25s;
        }

        .input-wrapper input:focus {
            background: #ffffff;
            border-color: #3677ac;
            box-shadow: 0 0 0 3px rgba(54, 119, 172, 0.12);
        }

        .btn-login {
            width: 100%;
            height: 54px;
            border: none;
            border-radius: 13px;
            background: linear-gradient(135deg, #234f75, #2e6b9c);
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 5px;
            transition: 0.25s;
            box-shadow: 0 9px 20px rgba(35, 79, 117, 0.2);
        }

        .btn-login:hover {
            transform: translateY(-2px);
        }

        .security {
            margin-top: 19px;
            background: #edf6ff;
            border-radius: 12px;
            padding: 12px;
            text-align: center;
            color: #67829a;
            font-size: 12px;
        }

        .footer {
            text-align: center;
            color: #9aaabd;
            font-size: 11px;
            margin-top: 22px;
        }

        /* =========================
           POPUP
        ========================== */

        .popup-overlay {
            position: fixed;
            inset: 0;
            background: rgba(8, 30, 48, 0.65);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 20px;
        }

        .popup-box {
            width: 100%;
            max-width: 380px;
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
            animation: popupShow 0.25s ease;
        }

        .popup-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 15px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            background: #edf6ff;
        }

        .popup-box h3 {
            color: #183d5d;
            font-size: 22px;
            margin-bottom: 9px;
        }

        .popup-box p {
            color: #71869a;
            line-height: 1.5;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .popup-btn {
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            background: #24577f;
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .popup-btn:hover {
            background: #183f5d;
        }

        @keyframes popupShow {
            from {
                opacity: 0;
                transform: scale(0.92);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @media (max-width: 850px) {

            body {
                padding: 15px;
            }

            .login-wrapper {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .left-panel {
                padding: 35px;
            }

            .left-content h1 {
                font-size: 34px;
            }

            .features {
                margin-top: 30px;
            }

            .right-panel {
                padding: 35px;
            }
        }

        @media (max-width: 500px) {

            .left-panel,
            .right-panel {
                padding: 25px;
            }

            .left-content h1 {
                font-size: 30px;
            }

            .left-content p {
                font-size: 14px;
            }

            .features {
                gap: 25px;
            }

            .login-content h2 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <!-- BAGIAN KIRI -->

    <div class="left-panel">

        <div class="brand">
            LIBRARY MANAGEMENT
        </div>

        <div class="left-content">

            <div class="book-icon">
                📚
            </div>

            <h1>
                Kelola Buku.<br>
                <span>Kelola Pengetahuan.</span>
            </h1>

            <p>
                Sistem manajemen perpustakaan untuk membantu
                mengelola koleksi buku dengan lebih mudah,
                rapi, dan terorganisir.
            </p>

        </div>

        <div class="features">

            <div class="feature">
                <div class="feature-icon">📖</div>
                <span>Koleksi Buku</span>
            </div>

            <div class="feature">
                <div class="feature-icon">🏷️</div>
                <span>Kategori</span>
            </div>

            <div class="feature">
                <div class="feature-icon">🔐</div>
                <span>Aman</span>
            </div>

        </div>

    </div>


    <!-- BAGIAN KANAN -->

    <div class="right-panel">

        <div class="login-content">

            <div class="welcome">
                SELAMAT DATANG
            </div>

            <h2>
                Masuk ke Sistem
            </h2>

            <p class="subtitle">
                Masuk untuk melanjutkan.
            </p>


            <!-- FORM LOGIN -->

            <form action="{{ route('login.process') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            ✉️
                        </span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required
                            autofocus
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            🔐
                        </span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                        >

                    </div>

                </div>


                <button type="submit" class="btn-login">
                    Login
                </button>

            </form>


            <div class="security">
                🔒 Data login kamu aman.
            </div>

            <div class="footer">
                Library Management System © 2026
            </div>

        </div>

    </div>

</div>


<!-- =========================
     POPUP LOGIN DIPERLUKAN
========================== -->

@if (request()->query('login_required'))

<div class="popup-overlay" id="loginRequiredPopup">

    <div class="popup-box">

        <div class="popup-icon">
            🔐
        </div>

        <h3>
            Login Diperlukan
        </h3>

        <p>
            Silakan login terlebih dahulu
            untuk mengakses halaman buku.
        </p>

        <button
            type="button"
            class="popup-btn"
            onclick="closePopup('loginRequiredPopup')">
            Login Sekarang
        </button>

    </div>

</div>

@endif


<!-- =========================
     POPUP LOGIN GAGAL
========================== -->

@if ($errors->any())

<div class="popup-overlay" id="errorPopup">

    <div class="popup-box">

        <div class="popup-icon">
            ❌
        </div>

        <h3>
            Login Gagal
        </h3>

        <p>
            Email atau password tidak sesuai.<br>
            Silakan periksa kembali data login kamu.
        </p>

        <button
            type="button"
            class="popup-btn"
            onclick="closePopup('errorPopup')">
            Coba Lagi
        </button>

    </div>

</div>

@endif


<!-- =========================
     POPUP LOGOUT
========================== -->

@if (session('success'))

<div class="popup-overlay" id="successPopup">

    <div class="popup-box">

        <div class="popup-icon">
            ✅
        </div>

        <h3>
            Logout Berhasil
        </h3>

        <p>
            Kamu telah berhasil keluar dari sistem.
        </p>

        <button
            type="button"
            class="popup-btn"
            onclick="closePopup('successPopup')">
            OK
        </button>

    </div>

</div>

@endif


<script>

    function closePopup(id) {

        const popup = document.getElementById(id);

        if (popup) {
            popup.style.display = 'none';
        }

    }

</script>

</body>
</html>