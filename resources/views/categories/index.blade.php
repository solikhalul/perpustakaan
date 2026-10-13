<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Categories - Library System</title>

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
            max-width: 1100px;
            margin: auto;
            padding: 50px 30px;
        }

        h1 {
            color: #0f172a;
            margin-bottom: 10px;
        }

        .description {
            color: #64748b;
            margin-bottom: 30px;
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .category {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .category-number {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .category-name {
            font-size: 20px;
            font-weight: bold;
        }

        footer {
            text-align: center;
            padding: 30px;
            color: #94a3b8;
        }

        @media (max-width: 768px) {
            .categories {
                grid-template-columns: 1fr;
            }

            nav {
                flex-direction: column;
                gap: 15px;
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

        <h1>Book Categories</h1>

        <p class="description">
            Daftar kategori buku yang tersedia di perpustakaan.
        </p>

        <div class="categories">

            @foreach ($categories as $index => $category)

                <div class="category">

                    <div class="category-number">
                        Kategori {{ $index + 1 }}
                    </div>

                    <div class="category-name">
                        📂 {{ $category }}
                    </div>

                </div>

            @endforeach

        </div>

    </div>


    <footer>
        &copy; {{ date('Y') }} Library System
    </footer>

</body>
</html>