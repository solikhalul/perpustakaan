<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Members - Library System</title>

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

        .menu a:hover {
            color: white;
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

        .table-container {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #1e293b;
            color: white;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #f8fafc;
        }

        footer {
            text-align: center;
            padding: 30px;
            color: #94a3b8;
        }

        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                gap: 15px;
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

        <h1>Library Members</h1>

        <p class="description">
            Daftar anggota yang terdaftar dalam sistem perpustakaan.
        </p>


        <div class="table-container">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($members as $index => $member)

                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $member['nama'] }}</td>
                            <td>{{ $member['email'] }}</td>
                            <td>{{ $member['telepon'] }}</td>
                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>


    <!-- FOOTER -->
    <footer>
        &copy; {{ date('Y') }} Library System
    </footer>

</body>
</html>