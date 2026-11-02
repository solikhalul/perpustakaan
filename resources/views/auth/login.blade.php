<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

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

            background:
                linear-gradient(
                    135deg,
                    #071a3d,
                    #0f3b78
                );

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 20px;
        }


        /* =================================
           LOGIN CONTAINER
        ================================= */

        .login-container {

            width: 850px;

            max-width: 100%;

            min-height: 500px;

            background: white;

            border-radius: 22px;

            overflow: hidden;

            display: grid;

            grid-template-columns: 42% 58%;

            box-shadow:
                0 25px 60px
                rgba(0, 0, 0, 0.35);
        }


        /* =================================
           BAGIAN KIRI
        ================================= */

        .left-section {

            background:
                linear-gradient(
                    145deg,
                    #0b2a5b,
                    #1555a5
                );

            color: white;

            padding: 45px 35px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        .logo {

            font-size: 15px;

            font-weight: bold;

            letter-spacing: 2px;

            margin-bottom: 35px;
        }


        .book-icon {

            font-size: 55px;

            margin-bottom: 20px;
        }


        .left-section h1 {

            font-size: 28px;

            line-height: 1.2;

            margin-bottom: 15px;
        }


        .left-section p {

            color: #dbeafe;

            font-size: 14px;

            line-height: 1.7;

            margin-bottom: 25px;
        }


        .features {

            display: flex;

            flex-direction: column;

            gap: 13px;
        }


        .feature {

            display: flex;

            align-items: center;

            gap: 10px;

            font-size: 13px;

            color: #e0ecff;
        }


        .feature-icon {

            width: 25px;

            height: 25px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.15);

            display: flex;

            align-items: center;

            justify-content: center;
        }


        /* =================================
           BAGIAN KANAN
        ================================= */

        .right-section {

            padding: 45px 50px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        .welcome {

            font-size: 12px;

            font-weight: bold;

            color: #2563eb;

            letter-spacing: 2px;

            margin-bottom: 8px;
        }


        .right-section h2 {

            font-size: 30px;

            color: #172554;

            margin-bottom: 8px;
        }


        .subtitle {

            color: #64748b;

            font-size: 14px;

            margin-bottom: 30px;
        }


        /* =================================
           FORM
        ================================= */

        .form-group {

            margin-bottom: 20px;
        }


        .form-group label {

            display: block;

            font-size: 13px;

            font-weight: bold;

            color: #334155;

            margin-bottom: 8px;
        }


        .form-group input {

            width: 100%;

            height: 46px;

            border: 1px solid #cbd5e1;

            border-radius: 10px;

            padding: 0 14px;

            font-size: 14px;

            outline: none;
        }


        .form-group input:focus {

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37, 99, 235, 0.12);
        }


        .login-button {

            width: 100%;

            height: 46px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8
                );

            color: white;

            font-size: 14px;

            font-weight: bold;

            cursor: pointer;
        }


        .login-button:hover {

            box-shadow:
                0 8px 20px
                rgba(37, 99, 235, 0.25);
        }


        .security-note {

            text-align: center;

            color: #94a3b8;

            font-size: 11px;

            margin-top: 20px;
        }


        .footer {

            text-align: center;

            color: #94a3b8;

            font-size: 11px;

            margin-top: 25px;
        }


        /* =================================
           ERROR LOGIN
        ================================= */

        .error-message {

            background: #fee2e2;

            color: #b91c1c;

            border: 1px solid #fecaca;

            border-radius: 8px;

            padding: 10px 12px;

            font-size: 12px;

            margin-bottom: 20px;
        }


        /* =================================
           POPUP LOGIN DIPERLUKAN
        ================================= */

        .popup-overlay {

            position: fixed;

            inset: 0;

            background:
                rgba(2, 6, 23, 0.60);

            display: flex;

            align-items: center;

            justify-content: center;

            z-index: 9999;
        }


        .popup-box {

            width: 370px;

            max-width:
                calc(100% - 30px);

            background: white;

            border-radius: 18px;

            padding: 32px;

            text-align: center;

            box-shadow:
                0 25px 60px
                rgba(0, 0, 0, 0.30);
        }


        .popup-icon {

            font-size: 45px;

            margin-bottom: 12px;
        }


        .popup-box h3 {

            color: #172554;

            font-size: 21px;

            margin-bottom: 10px;
        }


        .popup-box p {

            color: #64748b;

            font-size: 14px;

            line-height: 1.6;

            margin-bottom: 22px;
        }


        /*
        | Tombol popup menggunakan LINK,
        | bukan JavaScript.
        |
        | Jadi pasti menuju /login bersih.
        */

        .popup-btn {

            display: inline-block;

            border: none;

            background: #2563eb;

            color: white;

            padding: 11px 25px;

            border-radius: 9px;

            cursor: pointer;

            font-size: 13px;

            font-weight: bold;

            text-decoration: none;
        }


        .popup-btn:hover {

            background: #1d4ed8;
        }


        /* =================================
           RESPONSIVE
        ================================= */

        @media (max-width: 700px) {

            .login-container {

                grid-template-columns: 1fr;
            }


            .left-section {

                display: none;
            }


            .right-section {

                padding: 40px 25px;
            }
        }

    </style>

</head>


<body>


    <!-- =================================
         HALAMAN LOGIN
    ================================= -->

    <div class="login-container">


        <!-- BAGIAN KIRI -->

        <div class="left-section">


            <div class="logo">

                LIBRARY MANAGEMENT

            </div>


            <div class="book-icon">

                📚

            </div>


            <h1>

                Kelola Buku.<br>

                Kelola Pengetahuan.

            </h1>


            <p>

                Sistem manajemen perpustakaan
                untuk mengelola koleksi buku
                dengan mudah, cepat, dan
                terorganisir.

            </p>


            <div class="features">


                <div class="feature">

                    <div class="feature-icon">
                        ✓
                    </div>

                    <span>
                        Kelola koleksi buku
                    </span>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        ✓
                    </div>

                    <span>
                        Data kategori terorganisir
                    </span>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        ✓
                    </div>

                    <span>
                        Akses sistem yang aman
                    </span>

                </div>


            </div>


        </div>



        <!-- =================================
             BAGIAN KANAN
        ================================= -->

        <div class="right-section">


            <div class="welcome">

                SELAMAT DATANG

            </div>


            <h2>

                Masuk ke Sistem

            </h2>


            <p class="subtitle">

                Masuk untuk melanjutkan.

            </p>


            <!-- =================================
                 ERROR LOGIN
            ================================= -->

            @if ($errors->any())

                <div class="error-message">

                    Email atau password yang
                    kamu masukkan tidak sesuai.

                </div>

            @endif



            <!-- =================================
                 FORM LOGIN
            ================================= -->

            <form
                action="{{ route('login.process') }}"
                method="POST"
            >

                @csrf


                <div class="form-group">


                    <label for="email">

                        Email

                    </label>


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



                <div class="form-group">


                    <label for="password">

                        Password

                    </label>


                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >


                </div>



                <button
                    type="submit"
                    class="login-button"
                >

                    Login

                </button>


            </form>



            <div class="security-note">

                🔒 Login kamu dilindungi
                oleh sistem autentikasi.

            </div>


            <div class="footer">

                © {{ date('Y') }}
                Library Management

            </div>


        </div>

    </div>



    <!-- =================================
         POPUP LOGIN DIPERLUKAN
         
         HANYA MUNCUL KETIKA USER
         MENGAKSES /books TANPA LOGIN.
    ================================= -->

    @if (request()->query('login_required') === '1')


        <div
            class="popup-overlay"
            id="loginRequiredPopup"
        >


            <div class="popup-box">


                <div class="popup-icon">

                    🔒

                </div>


                <h3>

                    Login Diperlukan

                </h3>


                <p>

                    Silakan login terlebih dahulu
                    untuk mengakses halaman buku.

                </p>


                <!--
                | INI ADALAH LINK LANGSUNG
                | KE /login.
                |
                | Tidak menggunakan JavaScript.
                -->

                <a
                    href="{{ url('/login') }}"
                    class="popup-btn"
                >

                    Login Sekarang

                </a>


            </div>


        </div>


    @endif


</body>

</html>