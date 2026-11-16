
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman - Perpustakaan</title>
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
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 28px;
            border-radius: 15px;
            box-shadow: 0 5px 20px #00000012;
        }
        h2 { color: #1d4ed8; margin-top: 0; }
        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            margin-bottom: 18px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 13px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }
        th { background: #eff6ff; color: #1e40af; }
        .status {
            padding: 5px 9px;
            border-radius: 6px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 13px;
        }
        .detail { color: #2563eb; text-decoration: none; }
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 15px;
        }
        .empty { text-align: center; padding: 25px; color: #64748b; }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Peminjaman Buku</h2>
    <p>Kelola transaksi peminjaman dan pengembalian buku perpustakaan.</p>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('loans.create') }}" class="btn">+ Tambah Peminjaman</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Anggota</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($loans as $loan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $loan->member->nama }}</td>
                    <td>{{ $loan->tanggal_pinjam->format('d-m-Y') }}</td>
                    <td>{{ $loan->tanggal_jatuh_tempo->format('d-m-Y') }}</td>
                    <td><span class="status">{{ str_replace('_', ' ', ucfirst($loan->status)) }}</span></td>
                    <td>
                        <a class="detail" href="{{ route('loans.show', $loan->id) }}">
                            Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="empty">Belum ada transaksi peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
