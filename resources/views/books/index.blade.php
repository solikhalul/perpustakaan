<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Buku</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #222;
        }

        .top-button {
            margin-bottom: 20px;
        }

        .btn-tambah {
            display: inline-block;
            padding: 10px 18px;
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-tambah:hover {
            background-color: #0b5ed7;
        }

        .success {
            background-color: #d1e7dd;
            color: #0f5132;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #333;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        .btn-edit {
            display: inline-block;
            padding: 7px 12px;
            background-color: #ffc107;
            color: #000;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background-color: #ffca2c;
        }

        .btn-hapus {
            padding: 7px 12px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-hapus:hover {
            background-color: #bb2d3b;
        }

        .form-hapus {
            display: inline;
        }

        .kosong {
            text-align: center;
            padding: 30px;
            color: #666;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Daftar Buku Perpustakaan</h1>

    {{-- Tombol tambah buku --}}
    <div class="top-button">
        <a href="{{ route('books.create') }}" class="btn-tambah">
            + Tambah Buku
        </a>
    </div>

    {{-- Pesan berhasil --}}
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table>

        <thead>
            <tr>
                <th>ID</th>
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

                    <td>
                        {{ $book->id }}
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

                        {{-- Tombol Edit --}}
                        <a
                            href="{{ route('books.edit', $book->id) }}"
                            class="btn-edit"
                        >
                            Edit
                        </a>

                        {{-- Tombol Hapus --}}
                        <form
                            action="{{ route('books.destroy', $book->id) }}"
                            method="POST"
                            class="form-hapus"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn-hapus"
                                onclick="return confirm('Yakin ingin menghapus buku ini?')"
                            >
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="kosong">
                        Belum ada data buku.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>