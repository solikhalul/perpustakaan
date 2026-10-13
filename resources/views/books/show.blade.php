<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Detail - Library System</title>

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
        }

        .container {
            max-width: 900px;
            margin: auto;
            padding: 50px 30px;
        }

        h1 {
            color: #0f172a;
            margin-bottom: 30px;
        }

        .book-detail {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .detail-row {
            display: flex;
            padding: 18px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-label {
            width: 200px;
            font-weight: bold;
            color: #64748b;
        }

        .detail-value {
            flex: 1;
            color: #0f172a;
        }

        .back-button {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background: #1e293b;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .back-button:hover {
            background: #334155;
        }

        footer {
            text-align: center;
            padding: 30px;
            color: #94a3b8;
        }

        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                gap: 15px;
            }

            .detail-row {
                flex-direction: column;
                gap: 8px;
            }

            .detail-label {
                width: auto;
            }
        }
    </style>
</head>

<body>

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


    <div class="container">

        <h1>Book Detail</h1>

        <div class="book-detail">

            <div class="detail-row">
                <div class="detail-label">ID Buku</div>
                <div class="detail-value">
                    {{ $book->id }}
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Judul Buku</div>
                <div class="detail-value">
                    {{ $book->judul }}
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Penulis</div>
                <div class="detail-value">
                    {{ $book->penulis }}
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Tahun Terbit</div>
                <div class="detail-value">
                    {{ $book->tahun_terbit }}
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Stok</div>
                <div class="detail-value">
                    {{ $book->stok }}
                </div>
            </div>

            <a href="{{ route('books.index') }}" class="back-button">
                ← Kembali ke Books
            </a>

        </div>

    </div>


    <footer>
        &copy; {{ date('Y') }} Library System
    </footer>

</body>
</html>