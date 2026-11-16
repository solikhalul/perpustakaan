
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #eef4fb;
            color: #183153;
        }

        .container {
            padding: 30px;
        }

        .welcome {
            background: linear-gradient(135deg, #123b70, #2875bd);
            color: white;
            padding: 30px;
            border-radius: 14px;
            margin-bottom: 25px;
        }

        .welcome h1 {
            font-size: 27px;
            margin-bottom: 10px;
        }

        .welcome p {
            color: #dbeafe;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
            border-left: 5px solid #2875bd;
        }

        .card h3 {
            font-size: 15px;
            color: #64748b;
            margin-bottom: 15px;
        }

        .card .number {
            font-size: 32px;
            font-weight: bold;
            color: #123b70;
        }

        .section {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
            overflow-x: auto;
        }

        .section h2 {
            margin-bottom: 20px;
            font-size: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e5eaf0;
        }

        th {
            background: #edf4fc;
            color: #123b70;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #dbeafe;
            color: #1d4e89;
            font-size: 12px;
        }

        .empty {
            text-align: center;
            color: #64748b;
            padding: 25px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            .welcome h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    @include('layouts.navigation')

    <div class="container">

        <div class="welcome">
            <h1>Dashboard Perpustakaan 📚</h1>
            <p>Selamat datang, {{ Auth::user()->name ?? 'Pengguna' }}!</p>
            <p>Kelola data buku, anggota, kategori, dan transaksi peminjaman melalui sistem ini.</p>
        </div>

        <div class="cards">

            <div class="card">
                <h3>📚 Total Buku</h3>
                <div class="number">{{ $jumlahBuku }}</div>
            </div>

            <div class="card">
                <h3>👥 Total Anggota</h3>
                <div class="number">{{ $jumlahMember }}</div>
            </div>

            <div class="card">
                <h3>📂 Total Kategori</h3>
                <div class="number">{{ $jumlahKategori }}</div>
            </div>

            <div class="card">
                <h3>📝 Total Peminjaman</h3>
                <div class="number">{{ $jumlahPeminjaman }}</div>
            </div>

            <div class="card">
                <h3>📖 Peminjaman Aktif</h3>
                <div class="number">{{ $jumlahBukuDipinjam }}</div>
            </div>

        </div>

        <div class="section">

            <h2>Transaksi Peminjaman Terbaru</h2>

            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Anggota</th>
                        <th>Petugas</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($peminjamanTerbaru as $index => $loan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $loan->member->nama ?? '-' }}</td>
                            <td>{{ $loan->user->name ?? '-' }}</td>
                            <td>{{ $loan->tanggal_pinjam->format('d-m-Y') }}</td>
                            <td>{{ $loan->tanggal_jatuh_tempo->format('d-m-Y') }}</td>
                            <td>
                                <span class="status">
                                    {{ ucfirst(str_replace('_', ' ', $loan->status)) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">
                                Belum ada transaksi peminjaman.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

</body>
</html>
