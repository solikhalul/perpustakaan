<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Library System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #111827;
        }

        /* Navbar */
        .navbar {
            background: #1e293b;
            padding: 18px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 22px;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .nav-links a:hover {
            color: #93c5fd;
        }

        /* Container */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        /* Button tambah */
        .btn-tambah {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 14px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .btn-tambah:hover {
            background: #1d4ed8;
        }

        /* Success message */
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Table */
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

        thead {
            background: #1e293b;
            color: white;
        }

        th,
        td {
            padding: 18px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            font-size: 16px;
        }

        td {
            font-size: 16px;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        /* Tombol aksi */
        .btn-edit {
            display: inline-block;
            background: #fbbf24;
            color: #111827;
            padding: 10px 18px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
            margin-right: 8px;
        }

        .btn-edit:hover {
            background: #f59e0b;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 7px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }

        /* Footer */
        footer {
            text-align: center;
            color: #94a3b8;
            margin: 60px 0 30px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 18px 25px;
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .container {
                width: 95%;
                margin-top: 30px;
            }

            h1 {
                font-size: 28px;
            }

            th,
            td {
                padding: 12px 10px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="{{ route('dashboard') }}" class="logo">
            📚 Library System
        </a>

        <div class="nav-links">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('books.index') }}">Books</a>
            <a href="/categories">Categories</a>
            <a href="/members">Members</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="container">

        <h1>Daftar Buku</h1>

        <p class="subtitle">
            Daftar buku yang tersedia di perpustakaan.
        </p>

        <!-- Pesan berhasil -->
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol tambah -->
        <a href="{{ route('books.create') }}" class="btn-tambah">
            + Tambah Buku
        </a>

        <!-- Table -->
        <div class="table-container">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tahun Terbit</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($books as $book)

                        <tr>

                            <!-- Nomor urut tampilan -->
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $book->judul }}
                            </td>

                            <td>
                                {{ $book->penulis }}
                            </td>

                            <td>
                                {{ $book->tahun_terbit }}
                            </td>

                            <td>
                                {{ $book->stok }}
                            </td>

                            <td>

                                <!-- Detail -->
                                <a href="{{ route('books.show', $book->id) }}"
                                   style="
                                       display: inline-block;
                                       background: #3b82f6;
                                       color: white;
                                       padding: 10px 18px;
                                       border-radius: 7px;
                                       text-decoration: none;
                                       font-weight: bold;
                                       margin-right: 8px;
                                   ">
                                    Detail
                                </a>

                                <!-- Edit -->
                                <a href="{{ route('books.edit', $book->id) }}"
                                   class="btn-edit">
                                    Edit
                                </a>

                                <!-- Hapus -->
                                <form action="{{ route('books.destroy', $book->id) }}"
                                      method="POST"
                                      style="display: inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn-delete"
                                            onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" style="text-align: center; padding: 30px;">
                                Belum ada data buku.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- Footer -->
    <footer>
        © {{ date('Y') }} Library System
    </footer>

</body>
</html>