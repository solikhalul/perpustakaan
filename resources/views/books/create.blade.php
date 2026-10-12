<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Buku</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 13px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: -15px;
            margin-bottom: 15px;
        }

        .btn {
            background: #198754;
            color: white;
            border: none;
            padding: 13px 25px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .kembali {
            display: inline-block;
            margin-top: 25px;
            color: #333;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Tambah Buku</h1>

    <form action="{{ route('books.store') }}" method="POST">

        @csrf

        <label>Judul Buku</label>

        <input
            type="text"
            name="judul"
            value="{{ old('judul') }}"
            placeholder="Masukkan judul buku"
        >

        @error('judul')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        <label>Penulis</label>

        <input
            type="text"
            name="penulis"
            value="{{ old('penulis') }}"
            placeholder="Masukkan nama penulis"
        >

        @error('penulis')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        <label>Tahun Terbit</label>

        <input
            type="number"
            name="tahun_terbit"
            value="{{ old('tahun_terbit') }}"
            placeholder="Contoh: 2024"
        >

        @error('tahun_terbit')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        <label>Stok</label>

        <input
            type="number"
            name="stok"
            value="{{ old('stok') }}"
            placeholder="Masukkan jumlah stok"
            min="0"
        >

        @error('stok')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        <button type="submit" class="btn">
            Simpan Buku
        </button>

    </form>

    <a href="{{ route('books.index') }}" class="kembali">
        ← Kembali ke Daftar Buku
    </a>

</div>

</body>
</html>