<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Library System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        /* NAVBAR */
        nav {
            background: #1e293b;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 22px;
            font-weight: bold;
        }

        .menu {
            display: flex;
            gap: 28px;
        }

        .menu a {
            color: #e2e8f0;
            text-decoration: none;
            font-size: 15px;
        }

        .menu a:hover {
            color: white;
        }

        /* CONTENT */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 60px 30px;
        }

        .welcome {
            margin-bottom: 40px;
        }

        .welcome h1 {
            font-size: 38px;
            margin-bottom: 12px;
            color: #0f172a;
        }

        .welcome p {
            font-size: 17px;
            color: #64748b;
            margin: 0;
        }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .card-title {
            font-size: 17px;
            color: #64748b;
            margin-bottom: 15px;
        }

        .card-number {
            font-size: 40px;
            font-weight: bold;
            color: #0f172a;
        }

        .card-description {
            margin-top: 10px;
            color: #94a3b8;
            font-size: 14px;
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 30px;
            color: #94a3b8;
            font-size: 14px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            nav {
                padding: 18px 20px;
                flex-direction: column;
                gap: 15px;
            }

            .menu {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .welcome h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav>

        <div class="logo">
            📚 Library System
        </div>

        <div class="menu">
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            <a href="{{ url('/books') }}">Books</a>
            <a href="{{ url('/categories') }}">Categories</a>
            <a href="{{ url('/members') }}">Members</a>
        </div>

    </nav>


    <!-- CONTENT -->
    <div class="container">

        <div class="welcome">

            <h1>Library System Dashboard</h1>

            <p>
                Selamat datang di Sistem Informasi Perpustakaan.
                Kelola data perpustakaan dengan mudah dan terorganisir.
            </p>

        </div>


        <!-- STATISTICS -->
        <div class="cards">

            <div class="card">

                <div class="card-title">
                    📚 Total Buku
                </div>

                <div class="card-number">
                    {{ $jumlahBuku }}
                </div>

                <div class="card-description">
                    Jumlah buku dalam perpustakaan
                </div>

            </div>


            <div class="card">

                <div class="card-title">
                    👥 Total Member
                </div>

                <div class="card-number">
                    {{ $jumlahMember }}
                </div>

                <div class="card-description">
                    Jumlah anggota perpustakaan
                </div>

            </div>


            <div class="card">

                <div class="card-title">
                    📂 Total Kategori
                </div>

                <div class="card-number">
                    {{ $jumlahKategori }}
                </div>

                <div class="card-description">
                    Jumlah kategori buku
                </div>

            </div>

        </div>

    </div>


    <!-- FOOTER -->
    <footer>
        &copy; {{ date('Y') }} Library System
    </footer>

</body>
</html>