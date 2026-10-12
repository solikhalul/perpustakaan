<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Buku</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1450px;
            margin: auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
        }

        .btn-tambah {
            display: inline-block;
            background: #0d6efd;
            color: white;
            padding: 14px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .btn-tambah:hover {
            background: #0b5ed7;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #333;
            color: white;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .btn-edit {
            background: #ffc107;
            color: black;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-hapus {
            background: #dc3545;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .aksi {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Daftar Buku Perpustakaan</h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('books.create') }}" class="btn-tambah">
        + Tambah Buku
    </a>

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

            @forelse($books as $book)

                <tr>
                    <td>{{ $book->id }}</td>

                    <td>{{ $book->judul }}</td>

                    <td>{{ $book->penulis }}</td>

                    <td>{{ $book->tahun_terbit }}</td>

                    <td>{{ $book->stok }}</td>

                    <td>
                        <div class="aksi">

                            <a
                                href="{{ route('books.edit', $book->id) }}"
                                class="btn-edit"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('books.destroy', $book->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-hapus"
                                >
                                    Hapus
                                </button>

                            </form>

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" style="text-align:center;">
                        Belum ada data buku.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>