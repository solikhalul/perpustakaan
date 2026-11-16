
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota - Perpustakaan</title>
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
        h2 { color: #1d4ed8; }
        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            margin-bottom: 18px;
        }
        table { width: 100%; border-collapse: collapse; }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }
        th { background: #eff6ff; color: #1e40af; }
        .edit {
            background: #dbeafe;
            color: #1d4ed8;
            padding: 7px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .delete {
            background: #fee2e2;
            color: #b91c1c;
            padding: 7px 10px;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
        }
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 15px;
        }
        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 15px;
        }
        .status {
            padding: 5px 9px;
            border-radius: 5px;
            background: #dbeafe;
            color: #1d4ed8;
        }
        .empty { text-align: center; padding: 25px; }
        @media(max-width: 700px) {
            body { padding: 12px; }
            .container { overflow-x: auto; }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Anggota Perpustakaan</h2>
    <p>Kelola data anggota yang terdaftar di perpustakaan.</p>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <a href="{{ route('members.create') }}" class="btn">+ Tambah Anggota</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Anggota</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $member->nomor_anggota }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->email ?? '-' }}</td>
                    <td>{{ $member->telepon ?? '-' }}</td>
                    <td><span class="status">{{ ucfirst($member->status) }}</span></td>
                    <td>
                        <a href="{{ route('members.edit', $member->id) }}"
                           class="edit">Edit</a>

                        <form action="{{ route('members.destroy', $member->id) }}"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="empty">
                        Belum ada data anggota.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
