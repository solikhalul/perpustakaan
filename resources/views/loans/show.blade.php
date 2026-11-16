
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peminjaman - Perpustakaan</title>
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
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 28px;
            border-radius: 15px;
            box-shadow: 0 5px 20px #00000012;
        }
        h2, h3 { color: #1d4ed8; }
        .info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            background: #eff6ff;
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 25px;
        }
        .info p { margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td {
            padding: 13px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }
        th { background: #eff6ff; color: #1e40af; }
        input {
            width: 75px;
            padding: 8px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
        }
        button, .back {
            display: inline-block;
            border: none;
            padding: 9px 13px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
        }
        button { background: #2563eb; color: white; }
        .back { background: #e2e8f0; color: #334155; margin-top: 20px; }
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 15px;
        }
        .error {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 5px;
        }
        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 6px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 13px;
        }
        .returned { color: #15803d; font-weight: bold; }
        @media(max-width: 650px) {
            body { padding: 12px; }
            .info { grid-template-columns: 1fr; }
            .container { overflow-x: auto; }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Detail Peminjaman</h2>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <div class="info">
        <div>
            <p><strong>Nomor Transaksi:</strong> #{{ $loan->id }}</p>
            <p><strong>Nama Anggota:</strong> {{ $loan->member->nama }}</p>
            <p><strong>Nomor Anggota:</strong> {{ $loan->member->nomor_anggota }}</p>
        </div>
        <div>
            <p><strong>Petugas:</strong> {{ $loan->user->name }}</p>
            <p><strong>Tanggal Pinjam:</strong> {{ $loan->tanggal_pinjam->format('d-m-Y') }}</p>
            <p><strong>Jatuh Tempo:</strong> {{ $loan->tanggal_jatuh_tempo->format('d-m-Y') }}</p>
            <p><strong>Status:</strong>
                <span class="status">
                    {{ str_replace('_', ' ', ucfirst($loan->status)) }}
                </span>
            </p>
        </div>
    </div>

    <h3>Daftar Buku yang Dipinjam</h3>

    <table>
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Jumlah Pinjam</th>
                <th>Sudah Kembali</th>
                <th>Sisa</th>
                <th>Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loan->details as $detail)
                <tr>
                    <td>{{ $detail->book->judul }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>{{ $detail->jumlah_dikembalikan }}</td>
                    <td>{{ $detail->jumlah - $detail->jumlah_dikembalikan }}</td>
                    <td>
                        @php
                            $sisa = $detail->jumlah - $detail->jumlah_dikembalikan;
                        @endphp

                        @if($sisa > 0)
                            <form
                                action="{{ route('loans.return', [$loan->id, $detail->id]) }}"
                                method="POST">
                                @csrf

                                <input
                                    type="number"
                                    name="jumlah_dikembalikan"
                                    min="1"
                                    max="{{ $sisa }}"
                                    value="1"
                                    required>

                                <button type="submit">Kembalikan</button>
                            </form>
                        @else
                            <span class="returned">Sudah kembali</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <a href="{{ route('loans.index') }}" class="back">← Kembali ke Daftar Peminjaman</a>
</div>
</body>
</html>
