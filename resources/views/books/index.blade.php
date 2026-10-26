<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Koleksi Buku - Library Management</title>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #dceeff;
        color: #243b53;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 35px 25px 50px;
    }

    /* HEADER */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .header-left small {
        display: block;
        color: #55728d;
        font-size: 13px;
        letter-spacing: 2px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .header-left h1 {
        margin: 0;
        font-size: 34px;
        color: #163750;
    }

    .header-left p {
        margin: 8px 0 0;
        color: #668096;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-add {
        display: inline-block;
        text-decoration: none;
        background: #1e4264;
        color: white;
        padding: 13px 18px;
        border-radius: 10px;
        font-weight: bold;
        transition: 0.2s;
        white-space: nowrap;
    }

    .btn-add:hover {
        background: #163750;
        transform: translateY(-1px);
    }

    /* LOGOUT */
    .logout-form {
        margin: 0;
    }

    .btn-logout {
        border: none;
        background: #dc3545;
        color: white;
        padding: 13px 18px;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        font-size: 14px;
        transition: 0.2s;
        white-space: nowrap;
    }

    .btn-logout:hover {
        background: #b02a37;
        transform: translateY(-1px);
    }

    /* SUCCESS MESSAGE */
    .success-message {
        background: #e6f7ed;
        color: #17663a;
        border: 1px solid #b8e5ca;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 25px;
    }

    /* STATISTICS */
    .stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 25px;
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 22px;
        box-shadow: 0 5px 20px rgba(30, 66, 100, 0.08);
    }

    .stat-title {
        color: #718096;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 30px;
        font-weight: bold;
        color: #163750;
    }

    /* SEARCH */
    .search-card {
        background: white;
        padding: 18px;
        border-radius: 16px;
        margin-bottom: 20px;
        box-shadow: 0 5px 20px rgba(30, 66, 100, 0.08);
    }

    .search-box {
        width: 100%;
        padding: 14px 16px;
        border: 1px solid #d5e0ea;
        border-radius: 10px;
        font-size: 15px;
        outline: none;
    }

    .search-box:focus {
        border-color: #2d628f;
        box-shadow: 0 0 0 3px rgba(45, 98, 143, 0.10);
    }

    /* TABLE */
    .table-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(30, 66, 100, 0.08);
    }

    .table-header {
        padding: 22px 25px;
        border-bottom: 1px solid #edf1f5;
    }

    .table-header h2 {
        margin: 0;
        color: #163750;
        font-size: 20px;
    }

    .table-header p {
        margin: 6px 0 0;
        color: #7a8b99;
        font-size: 14px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #f7fafd;
        color: #526a7d;
        text-align: left;
        padding: 15px 18px;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    td {
        padding: 17px 18px;
        border-top: 1px solid #edf1f5;
        vertical-align: middle;
    }

    tr:hover td {
        background: #fbfdff;
    }

    .number {
        color: #7b8b99;
        font-weight: bold;
    }

    .book-title {
        font-weight: bold;
        color: #163750;
        margin-bottom: 5px;
    }

    .book-author {
        color: #7b8b99;
        font-size: 13px;
    }

    .category {
        display: inline-block;
        background: #e8f2fb;
        color: #1e4264;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    /* ACTION BUTTON */
    .actions {
        display: flex;
        gap: 7px;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-block;
        text-decoration: none;
        padding: 7px 11px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: bold;
        border: none;
        cursor: pointer;
    }

    .btn-detail {
        background: #e8f2fb;
        color: #1e4264;
    }

    .btn-edit {
        background: #fff3cd;
        color: #856404;
    }

    .btn-delete {
        background: #fce8e8;
        color: #b42318;
    }

    .btn:hover {
        opacity: 0.8;
    }

    .delete-form {
        display: inline;
        margin: 0;
    }

    /* EMPTY */
    .empty {
        text-align: center;
        padding: 50px 20px;
        color: #7b8b99;
    }

    .empty-icon {
        font-size: 45px;
        margin-bottom: 12px;
    }

    /* RESPONSIVE */
    @media (max-width: 800px) {

        .header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-actions {
            width: 100%;
        }

        .btn-add,
        .btn-logout {
            flex: 1;
            text-align: center;
        }

        .stats {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 500px) {

        .container {
            padding: 25px 15px 40px;
        }

        .header-left h1 {
            font-size: 28px;
        }

        .header-actions {
            flex-direction: column;
            width: 100%;
        }

        .btn-add,
        .btn-logout {
            width: 100%;
        }
    }
</style>

</head>

<body>

<div class="container">

<div class="header">

    <div class="header-left">

        <small>LIBRARY MANAGEMENT</small>

        <h1>Koleksi Buku</h1>

        <p>
            Kelola dan lihat seluruh koleksi buku perpustakaan.
        </p>

    </div>

    <div class="header-actions">

        <a
            href="{{ route('books.create') }}"
            class="btn-add"
        >
            + Tambah Buku
        </a>

        <form
            action="{{ route('logout') }}"
            method="POST"
            class="logout-form"
        >
            @csrf

            <button
                type="submit"
                class="btn-logout"
            >
                Logout
            </button>

        </form>

    </div>

</div>


@if (session('success'))

    <div class="success-message">
        {{ session('success') }}
    </div>

@endif


<div class="stats">

    <div class="stat-card">

        <div class="stat-title">
            Total Buku
        </div>

        <div class="stat-value">
            {{ $books->count() }}
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-title">
            Total Kategori
        </div>

        <div class="stat-value">
            {{ $books->pluck('category_id')->filter()->unique()->count() }}
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-title">
            Total Stok Buku
        </div>

        <div class="stat-value">
            {{ $books->sum('stok') }}
        </div>

    </div>

</div>


<div class="search-card">

    <input
        type="text"
        id="searchInput"
        class="search-box"
        placeholder="Cari judul atau penulis..."
        onkeyup="searchBook()"
    >

</div>


<div class="table-card">

    <div class="table-header">

        <h2>Daftar Buku</h2>

        <p>
            Semua buku yang tersimpan di perpustakaan.
        </p>

    </div>


    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>

            </thead>


            <tbody id="bookTable">

                @forelse ($books as $book)

                    <tr>

                        <td class="number">
                            {{ $loop->iteration }}
                        </td>


                        <td>

                            <div class="book-title">
                                {{ $book->judul }}
                            </div>

                            <div class="book-author">
                                {{ $book->penulis }}
                            </div>

                        </td>


                        <td>
                            {{ $book->tahun_terbit }}
                        </td>


                        <td>
                            {{ $book->stok }}
                        </td>


                        <td>

                            @if ($book->category)

                                <span class="category">
                                    {{ $book->category->name }}
                                </span>

                            @else

                                <span style="color: #999;">
                                    -
                                </span>

                            @endif

                        </td>


                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('books.show', $book->id) }}"
                                    class="btn btn-detail"
                                >
                                    Detail
                                </a>


                                <a
                                    href="{{ route('books.edit', $book->id) }}"
                                    class="btn btn-edit"
                                >
                                    Edit
                                </a>


                                <form
                                    action="{{ route('books.destroy', $book->id) }}"
                                    method="POST"
                                    class="delete-form"
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

                        <td colspan="6">

                            <div class="empty">

                                <div class="empty-icon">
                                    📚
                                </div>

                                <strong>
                                    Belum ada buku
                                </strong>

                                <p>
                                    Silakan tambahkan buku terlebih dahulu.
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

<script>

    function searchBook() {

        const input = document
            .getElementById('searchInput')
            .value
            .toLowerCase();

        const rows = document.querySelectorAll(
            '#bookTable tr'
        );

        rows.forEach(function(row) {

            const text = row.innerText.toLowerCase();

            if (text.includes(input)) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }
