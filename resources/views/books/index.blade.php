<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Buku - Perpustakaan</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #0f2f5f;
            color: #ffffff;
        }

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 35px auto;
        }

        .header {
            background: #163d73;
            padding: 25px 30px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .header p {
            margin: 0;
            color: #dbe8f8;
        }

        .menu {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        .menu a,
        .menu button {
            border: none;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .menu-books {
            background: #ffffff;
            color: #163d73;
        }

        .menu-users {
            background: #f0ad4e;
            color: #ffffff;
        }

        .menu-logout {
            background: #d9534f;
            color: #ffffff;
        }

        .content {
            background: #ffffff;
            color: #222222;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
        }

        .content-header h2 {
            margin: 0;
            color: #163d73;
        }

        .btn-add {
            background: #163d73;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 8px;
            font-weight: bold;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #163d73;
            color: white;
            padding: 14px 12px;
            text-align: left;
        }

        td {
            padding: 13px 12px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
            color: #222222;
        }

        tr:hover {
            background: #f5f8fc;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
        }

        .btn-detail {
            background: #5bc0de;
            color: white;
        }

        .btn-edit {
            background: #f0ad4e;
            color: white;
        }

        .btn-delete {
            background: #d9534f;
            color: white;
        }

        .stock {
            font-weight: bold;
        }

        form {
            display: inline;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        @media (max-width: 700px) {
            .header-top,
            .content-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .container {
                width: 95%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">

        <div class="header-top">

            <div>
                <h1>Perpustakaan</h1>

                <p>
                    Selamat datang,
                    <strong>{{ auth()->user()->name }}</strong>
                </p>
            </div>

        </div>

        <!-- MENU -->
        <div class="menu">

            <!-- DATA BUKU -->
            <a
                href="{{ route('books.index') }}"
                class="menu-books"
            >
                📚 Data Buku
            </a>

            <!-- KELOLA PENGGUNA - ADMIN SAJA -->
            @can('manage-users')

                <a
                    href="{{ route('users.index') }}"
                    class="menu-users"
                >
                    👥 Kelola Pengguna
                </a>

            @endcan

            <!-- LOGOUT -->
            <form
                action="{{ route('logout') }}"
                method="POST"
            >
                @csrf

                <button
                    type="submit"
                    class="menu-logout"
                >
                    🚪 Logout
                </button>
            </form>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="content-header">

            <h2>Data Buku</h2>

            <a
                href="{{ route('books.create') }}"
                class="btn-add"
            >
                + Tambah Buku
            </a>

        </div>

        <!-- PESAN SUKSES -->
        @if(session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif

        <!-- PESAN ERROR -->
        @if(session('error'))

            <div class="error">
                {{ session('error') }}
            </div>

        @endif

        <!-- TABEL BUKU -->
        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Tahun Terbit</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($books as $book)

                        <tr>

                            <!-- NOMOR -->
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <!-- JUDUL BUKU -->
                            <td>
                                {{ $book->judul }}
                            </td>

                            <!-- PENULIS -->
                            <td>
                                {{ $book->penulis }}
                            </td>

                            <!-- TAHUN TERBIT -->
                            <td>
                                {{ $book->tahun_terbit }}
                            </td>

                            <!-- STOK -->
                            <td>
                                <span class="stock">
                                    {{ $book->stok }}
                                </span>
                            </td>

                            <!-- KATEGORI -->
                            <td>

                                @if($book->category)
                                    {{ $book->category->name }}
                                @else
                                    -
                                @endif

                            </td>

                            <!-- AKSI -->
                            <td>

                                <div class="actions">

                                    <!-- DETAIL -->
                                    <a
                                        href="{{ route('books.show', $book) }}"
                                        class="btn btn-detail"
                                    >
                                        Detail
                                    </a>

                                    <!-- EDIT -->
                                    <a
                                        href="{{ route('books.edit', $book) }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <!-- HAPUS -->
                                    <form
                                        action="{{ route('books.destroy', $book) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-delete"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="empty"
                            >
                                Belum ada data buku.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>