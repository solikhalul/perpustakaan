
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota - Perpustakaan</title>
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
            max-width: 750px;
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
        input, textarea, select {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 14px;
        }
        textarea { min-height: 90px; resize: vertical; }
        button, .back {
            display: inline-block;
            padding: 11px 17px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            margin-top: 22px;
        }
        .submit { background: #2563eb; color: white; }
        .back { background: #e2e8f0; color: #334155; }
        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 7px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Anggota</h2>
    <p>Masukkan informasi anggota perpustakaan.</p>

    @if($errors->any())
        <div class="error">
            <strong>Periksa kembali data:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <label>Nomor Anggota</label>
        <input type="text" name="nomor_anggota"
               value="{{ old('nomor_anggota') }}"
               placeholder="Contoh: AGT001" required>

        <label>Nama Lengkap</label>
        <input type="text" name="nama"
               value="{{ old('nama') }}"
               placeholder="Masukkan nama anggota" required>

        <label>Email</label>
        <input type="email" name="email"
               value="{{ old('email') }}"
               placeholder="contoh@email.com">

        <label>Nomor Telepon</label>
        <input type="text" name="telepon"
               value="{{ old('telepon') }}"
               placeholder="Masukkan nomor telepon">

        <label>Alamat</label>
        <textarea name="alamat"
                  placeholder="Masukkan alamat anggota">{{ old('alamat') }}</textarea>

        <label>Status Anggota</label>
        <select name="status" required>
            <option value="aktif" {{ old('status', 'aktif') == 'aktif' ? 'selected' : '' }}>
                Aktif
            </option>
            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>
                Nonaktif
            </option>
        </select>

        <a href="{{ route('members.index') }}" class="back">Kembali</a>
        <button type="submit" class="submit">Simpan Anggota</button>
    </form>
</div>
</body>
</html>
