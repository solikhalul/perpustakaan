<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Buku</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            margin-top: 25px;
            padding: 12px 20px;
            background: #198754;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #157347;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #333;
        }

        .error {
            background: #f8d7da;
            color: #842029;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Buku</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label for="judul">Judul Buku</label>
        <input
            type="text"
            id="judul"
            name="judul"
            value="{{ old('judul', $book->judul) }}"
            required
        >

        <label for="penulis">Penulis</label>
        <input
            type="text"
            id="penulis"
            name="penulis"
            value="{{ old('penulis', $book->penulis) }}"
            required
        >

        <label for="tahun_terbit">Tahun Terbit</label>
        <input
            type="number"
            id="tahun_terbit"
            name="tahun_terbit"
            value="{{ old('tahun_terbit', $book->tahun_terbit) }}"
            required
        >

        <label for="stok">Stok</label>
        <input
            type="number"
            id="stok"
            name="stok"
            value="{{ old('stok', $book->stok) }}"
            required
        >

        <button type="submit">
            Simpan Perubahan
        </button>

    </form>

    <a class="back" href="{{ route('books.index') }}">
        ← Kembali ke Daftar Buku
    </a>

</div>

</body>
</html>