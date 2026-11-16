
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman - Perpustakaan</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #eaf2ff;
            color: #1e293b;
        }
        .container {
            max-width: 850px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px #00000012;
        }
        h2 { color: #1d4ed8; }
        label {
            display: block;
            margin: 16px 0 7px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
        }
        .book-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 12px;
            margin-bottom: 12px;
        }
        button, .back {
            display: inline-block;
            border: none;
            padding: 11px 17px;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        .submit { background: #2563eb; color: white; }
        .add { background: #dbeafe; color: #1d4ed8; margin: 10px 0 18px; }
        .back { background: #e2e8f0; color: #334155; }
        .remove { background: #fee2e2; color: #b91c1c; }
        .error {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 5px;
        }
        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 15px;
        }
        @media(max-width: 600px) {
            body { padding: 12px; }
            .book-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Peminjaman Buku</h2>
    <p>Masukkan data anggota dan buku yang akan dipinjam.</p>

    @if($errors->any())
        <div class="error-box">
            <strong>Periksa kembali data berikut:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <label>Anggota</label>
        <select name="member_id" required>
            <option value="">-- Pilih Anggota --</option>
            @foreach($members as $member)
                <option value="{{ $member->id }}"
                    {{ old('member_id') == $member->id ? 'selected' : '' }}>
                    {{ $member->nomor_anggota }} - {{ $member->nama }}
                </option>
            @endforeach
        </select>

        <label>Tanggal Peminjaman</label>
        <input type="date" name="tanggal_pinjam"
               value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" required>

        <label>Tanggal Jatuh Tempo</label>
        <input type="date" name="tanggal_jatuh_tempo"
               value="{{ old('tanggal_jatuh_tempo') }}" required>

        <hr style="margin:25px 0; border:0; border-top:1px solid #e2e8f0">

        <h3>Daftar Buku</h3>

        <div id="book-list">
            <div class="book-row">
                <div>
                    <label>Pilih Buku</label>
                    <select name="details[0][book_id]" required>
                        <option value="">-- Pilih Buku --</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}">
                                {{ $book->judul }} (Stok: {{ $book->stok }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Jumlah</label>
                    <input type="number" name="details[0][jumlah]"
                           min="1" value="1" required>
                </div>
            </div>
        </div>

        <button type="button" class="add" onclick="addBook()">
            + Tambah Buku
        </button>

        <br>

        <a href="{{ route('loans.index') }}" class="back">Kembali</a>
        <button type="submit" class="submit">Simpan Peminjaman</button>
    </form>
</div>

<script>
    let bookIndex = 1;

    function addBook() {
        const list = document.getElementById('book-list');

        const row = document.createElement('div');
        row.className = 'book-row';

        row.innerHTML = `
            <div>
                <label>Pilih Buku</label>
                <select name="details[${bookIndex}][book_id]" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">
                            {{ $book->judul }} (Stok: {{ $book->stok }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Jumlah</label>
                <input type="number" name="details[${bookIndex}][jumlah]"
                       min="1" value="1" required>
                <button type="button" class="remove"
                        onclick="this.closest('.book-row').remove()">
                    Hapus
                </button>
            </div>
        `;

        list.appendChild(row);
        bookIndex++;
    }
</script>
</body>
</html>
