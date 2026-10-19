<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Buku</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1300px;
            margin: auto;
        }

        h1 {
            margin-bottom: 10px;
        }

        .deskripsi {
            color: #555;
            margin-bottom: 25px;
        }

        /* Pesan berhasil */
        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Tombol tambah */
        .btn-tambah {
            display: inline-block;
            background: #0d6efd;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-weight: bold;
        }

        .btn-tambah:hover {
            background: #0b5ed7;
        }

        /* Tabel */
        .table-container {
            background: white;
            padding: 24px;
            border-radius: 12px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #1f2937;
            color: white;
            padding: 14px;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        tr:hover {
            background: #f8f9fa;
        }

        /* Kategori */
        .kategori {
            background: #e9ecef;
            padding: 7px 12px;
            border-radius: 5px;
            display: inline-block;
            white-space: nowrap;
        }

        /* Bagian Aksi */
        .aksi {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        /* Semua tombol aksi */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 68px;
            height: 38px;

            padding: 0 12px;

            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;

            box-sizing: border-box;
        }

        /* Tombol Detail */
        .detail {
            background: #0d6efd;
            color: white;
        }

        .detail:hover {
            background: #0b5ed7;
        }

        /* Tombol Edit */
        .edit {
            background: #ffc107;
            color: black;
        }

        .edit:hover {
            background: #e0a800;
        }

        /* Tombol Hapus */
        .form-hapus {
            margin: 0;
            padding: 0;
        }

        .hapus {
            min-width: 68px;
            height: 38px;

            padding: 0 12px;

            border: none;
            border-radius: 6px;

            background: #dc3545;
            color: white;

            font-weight: bold;
            font-size: 14px;

            cursor: pointer;
        }

        .hapus:hover {
            background: #bb2d3b;
        }

        /* Jika belum ada buku */
        .kosong {
            text-align: center;
            padding: 30px;
            color: #666;
        }

        /* Tampilan layar kecil */
        @media (max-width: 768px) {

            body {
                padding: 20px;
            }

            .table-container {
                padding: 15px;
            }

            th,
            td {
                padding: 10px;
            }

            .aksi {
                flex-direction: column;
                align-items: stretch;
            }

            .btn,
            .hapus {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- Judul -->
    <h1>Daftar Buku</h1>

    <p class="deskripsi">
        Daftar buku yang tersedia di perpustakaan.
    </p>


    <!-- Pesan berhasil -->
    @if (session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <!-- Tombol tambah -->
    <a
        href="{{ route('books.create') }}"
        class="btn-tambah"
    >
        + Tambah Buku
    </a>


    <!-- Tabel -->
    <div class="table-container">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>

            </thead>


            <tbody>

                @forelse ($books as $book)

                    <tr>

                        <!-- Nomor -->
                        <td>
                            {{ $loop->iteration }}
                        </td>


                        <!-- Judul -->
                        <td>
                            {{ $book->judul }}
                        </td>


                        <!-- Penulis -->
                        <td>
                            {{ $book->penulis }}
                        </td>


                        <!-- Tahun -->
                        <td>
                            {{ $book->tahun_terbit }}
                        </td>


                        <!-- Stok -->
                        <td>
                            {{ $book->stok }}
                        </td>


                        <!-- Kategori -->
                        <td>

                            @if ($book->category)

                                <span class="kategori">
                                    {{ $book->category->name }}
                                </span>

                            @else

                                <span>
                                    -
                                </span>

                            @endif

                        </td>


                        <!-- Aksi -->
                        <td>

                            <div class="aksi">

                                <!-- Detail -->
                                <a
                                    href="{{ route('books.show', $book) }}"
                                    class="btn detail"
                                >
                                    Detail
                                </a>


                                <!-- Edit -->
                                <a
                                    href="{{ route('books.edit', $book) }}"
                                    class="btn edit"
                                >
                                    Edit
                                </a>


                                <!-- Hapus -->
                                <form
                                    action="{{ route('books.destroy', $book) }}"
                                    method="POST"
                                    class="form-hapus"
                                    onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="hapus"
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
                            class="kosong"
                        >
                            Belum ada data buku.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>