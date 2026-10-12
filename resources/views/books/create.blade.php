<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>

    <h1>Tambah Buku</h1>

    <form action="/books" method="POST">
        @csrf

        <div>
            <label>Judul:</label>
            <input type="text" name="judul" required>
        </div>

        <br>

        <div>
            <label>Penulis:</label>
            <input type="text" name="penulis" required>
        </div>

        <br>

        <div>
            <label>Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" required>
        </div>

        <br>

        <div>
            <label>Stok:</label>
            <input type="number" name="stok" required>
        </div>

        <br>

        <button type="submit">Simpan</button>
        <a href="/books">Kembali</a>
    </form>

</body>
</html>